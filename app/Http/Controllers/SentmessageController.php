<?php

namespace App\Http\Controllers;

use App\Sentmessage;
use App\Phonegroup;
use App\Phonebook;
use App\User;
// use App\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Pool;


class SentmessageController extends Controller
{

    public function __construct (){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->username=="smsadmin") {
            $groups = Phonegroup::all();
            $contacts = Phonebook::all();
            return view('posts.sendmessage',['groups'=>$groups,'contacts'=>$contacts]);
        }else {
            $groups = Phonegroup::where('username',auth()->user()->username)->get();
            $contacts = Phonebook::where('username',auth()->user()->username)->get();
            return view('posts.sendmessage',['groups'=>$groups,'contacts'=>$contacts]);
        }
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'recipient' => 'required|min:9',
            'senderid'  =>'required|max:11',
            'message'  =>'required|min:1',         
        ]);
       $messageid = strtoupper(auth()->user()->id).substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 8);

       $parameters = [
            'type'=>$request->type,
            'messageid'=>$messageid,            
            'source'=>$request->senderid,
            'message'=>$request->message,
            'dlr'=>0
        ]; 

        $urlparams = http_build_query($parameters);
    

        function sanitizeRecipient($recipient){
                $recipient = trim(preg_replace("/[\n]*/", '', $recipient));
                $recipients = preg_replace('/[^0-9]/', '', $recipient);
                $rlength = strlen($recipient);
                if($rlength>20){$recipient = "";}
                if($rlength<9){$recipient = "";}
                //Arrange Contact Correctly
                if(substr( $recipient, 0, 1 ) == "0" && substr( $recipient, 0, 3 ) != "009")
                {$recipient = "234".substr($recipient,1);}
                elseif(substr( $recipient, 0, 3 ) == "234"){$recipient = $recipient;}
                elseif(substr( $recipient, 0, 1 ) == "+"){$recipient = substr($recipient,1);}
                elseif(substr( $recipient, 0, 1 ) == " "){ $recipient = "";}
                elseif(substr( $recipient, 0, 1 ) == ""){ $recipient = "";}
                elseif(substr( $recipient, 0, 3 ) == "009"){$recipient= substr( $recipient, 3 );}
                elseif($rlength<7 || $rlength>18){$recipient = "";}
                else{$recipient = $recipient; }
                return $recipient;
        }
      
        $phonenumbers = $request->recipient;
        
            $phonenumbers = explode(',',$request->recipient);
            
            $user = User::where('username',auth()->user()->username)->first();           

            if($request->route=="Corporate"){
                // Deduct User Credit
            $totalunit = count($phonenumbers)*2;

            $link = 'https://ngn.rmlconnect.net/bulksms/bulksms?username=ncoinmacsmsCC&password=TPmSZVZx&'.$urlparams;
            }else{
                // Deduct User Credit
            $totalunit = count($phonenumbers);            

            $link = 'http://smsplus4.routesms.com/bulksms/bulksms?username=ncoinmacsms&password=j7NbFate&'.$urlparams;
            }

            // Make sure you've got the Page model
            if($user) {
                $user->units = (auth()->user()->units)-($totalunit);
                $user->save();
            }
            
            // array of curl handles
            $multiCurl = array();
            // data to be returned
            $result = array();
            // multi handle
            $mh = curl_multi_init();
            
            if(count($phonenumbers) > 25){               
                foreach(array_chunk($phonenumbers,25) as $nochunks){
                    $recipient = "";    
                    foreach($nochunks as $key => $recip){
                        $recipient2 = sanitizeRecipient($recip);

                        if (end(array_keys($nochunks)) == $key)
                        {
                            $recipient.=$recipient2;
                        }else{
                            $recipient.=$recipient2.",";
                        }
                        // At the last iteration, a string of 25 recipients will be generated
                    }
                    $fetchURL = $link."&destination=".$recipient;
                    $multiCurl[$i] = curl_init();
                    curl_setopt($multiCurl[$i], CURLOPT_URL,$fetchURL);
                    curl_setopt($multiCurl[$i], CURLOPT_HEADER,0);
                    curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER,1);
                    curl_multi_add_handle($mh, $multiCurl[$i]);
                };

            }else{
                foreach($phonenumbers as $key => $recip){
                    $recipient2 = sanitizeRecipient($recip);

                    if (end(array_keys($nochunks)) == $key){
                        $recipient.=$recipient2;
                    }else{
                        $recipient.=$recipient2.",";
                    }
                    // At the last iteration, a string of 25 recipients will be generated
                }
               
                $fetchURL = $link."&destination=".$recipient;
                $multiCurl[$i] = curl_init();
                curl_setopt($multiCurl[$i], CURLOPT_URL,$fetchURL);
                curl_setopt($multiCurl[$i], CURLOPT_HEADER,0);
                curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER,1);
                curl_multi_add_handle($mh, $multiCurl[$i]);
            }
            

            /*
            foreach ($phonenumbers as $i => $recipient) {
                $recipient = sanitizeRecipient($recipient);
            // URL from which data will be fetched
            $fetchURL = $link."&destination=".$recipient;
            $multiCurl[$i] = curl_init();
            curl_setopt($multiCurl[$i], CURLOPT_URL,$fetchURL);
            curl_setopt($multiCurl[$i], CURLOPT_HEADER,0);
            curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER,1);
            curl_multi_add_handle($mh, $multiCurl[$i]);
            }
            */
            $index=null;
            do {
            curl_multi_exec($mh,$index);
            } while($index > 0);
            // get content and remove handles
            foreach($multiCurl as $k => $ch) {
            $result[$k] = curl_multi_getcontent($ch);
            curl_multi_remove_handle($mh, $ch);
            }
            // close
            curl_multi_close($mh);

            $status =  '<pre>'.var_dump($result).'</pre>';

            Sentmessage::create([
                'title'=>$request->senderid,
                'recipient'=>$request->recipient,
                'message'=>$request->message,            
                'messageid'=>$messageid,
                'scheduled'=>$request->schedule,
                'scheduletime'=>$request->scheduledate.":".$request->scheduletime,
                'status' =>$status,
                'username'=>auth()->user()->username,
                'group'=>$request->group
            ]);

        session()->flash('message','Your Message with the title: '.$request->senderid.', Total Units Deducted: '.$totalunit.' has been sent successfully!');
        return redirect()->back();

        // http://smsplus4.routesms.com/bulksms/bulksms?username=ncoinmacsms&password=j7NbFate&type=0&dlr=1&messageid=testsms&destination=2347067973091&source=Tony&message=HelloTony

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sentmessage  $sentmessage
     * @return \Illuminate\Http\Response
     */
    public function show(Sentmessage $sentmessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sentmessage  $sentmessage
     * @return \Illuminate\Http\Response
     */
    public function edit(Sentmessage $sentmessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sentmessage  $sentmessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentmessage $sentmessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sentmessage  $sentmessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sentmessage $sentmessage)
    {
        //
    }

    public function getgroupnos($id)
    {
        // Get id from database, just skiping this step there
        $contacts = Phonebook::where([['username','=',auth()->user()->username],['phonegroup','=',$id]])->get();
        $contact = "";
        foreach ($contacts as $key => $no) {
            $contact.=$no->phone_number.",";
            // TO DO: check the end of foreach loop and remove comma
        }
        return response()->json(['contacts' =>$contact]);
    }

    public function sentmessages(Sentmessage $sentmessage){
        if (auth()->user()->username=="smsadmin") {
            $sentmessage = Sentmessage::orderBy('created_at', 'desc')->get();
            return view('posts.sentmessages',['messages'=>$sentmessage]);
        }else {
            $sentmessage = Sentmessage::where('username',auth()->user()->username)->orderBy('created_at', 'desc')->get();
            return view('posts.sentmessages',['messages'=>$sentmessage]);
        }
        
    }

    public function recipients($messageid){
            $recipients = Sentmessage::where('messageid','=',$messageid)->first()
            
            return view('posts.recipients',['recipients'=>$recipients]);
        
    }

    public function status($messageid){
            $status = Sentmessage::where('messageid','=',$messageid)->first()
            
            return view('posts.status',['status'=>$status]);
        
    }
}
