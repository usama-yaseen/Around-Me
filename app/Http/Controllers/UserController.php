<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Echo_;

class UserController extends Controller
{
    //Done
    public function index()
    {
        return view('index');
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function getinfo()
    {
        $user = session('username');
        $name = session('name');
        $bio = session('bio');
        $image = session('image');
        return ["user" => $user, "NameOfUser" => $name, "image" => $image, "bio" => $bio];
    }

    //Done
    public function authenticate(REQUEST $req)
    {
        $emailname = $req->input("email");
        $pass = REQUEST("password");

        $value = DB::select('select username,password,name,question,answer,bio,ProfileIMG from user where username = ?', [$emailname]);

        if (count($value) == 0) {
            return "No User with this email found.";
        } else {
            if ($value[0]->password == $pass) {
                session(['username' => $value[0]->username]);
                session(['password' => $value[0]->password]);
                session(['name' => $value[0]->name]);
                session(['question' => $value[0]->question]);
                session(['answer' => $value[0]->answer]);
                session(['bio' => $value[0]->bio]);
                session(['image' => $value[0]->ProfileIMG]);
                return ("/Home");
            } else {
                return "Incorrect Password.";
            }
        }
    }

    public function settingsverifyuser()
    {
        $emailname = session('username');
        $pass = REQUEST("password");

        $value = DB::select('select password from user where username = ?', [$emailname]);

        if ($value[0]->password == $pass) {
            return ("/Home");
        } else {
            return "Incorrect Password.";
        }
    }

    //Done
    public function forgotpassworduserauth()
    {

        $emailname = REQUEST('email');
        $value = DB::select('select username,Question from user where username = ?', [$emailname]);
        if (count($value) == 0) {
            return "User Not Found";
        } else {
            return $value;
        }
    }

    //Done
    public function forgotpasswordQuesauth()
    {

        $emailname = REQUEST('email');
        $ans = REQUEST('ans');
        $value = DB::select('select username,Answer from user where username = ?', [$emailname]);
        if ($value[0]->Answer == $ans) {
            return 'Correct Answer';
        } else {
            return 'Incorrect Answer';
        }
    }

    //Done
    public function updatepass(REQUEST $req)
    {
        $username = session('username');
        $newpass = $req->input('newpass');

        DB::update("update user set Password = ? where username = ?", [$newpass, $username]);
        session(['password' => $newpass]);
    }

    //Done
    public function getUserData($id)
    {
        // $nameofuser=REQUEST("abc");
        // $value = DB::select('select Name,ProfileIMG from user where username = ?', [$nameofuser]);
        $value = DB::select('select username,Name,ProfileIMG from user where username = ?', [$id]);

        if (count($value) == 0) {
            echo ("No Data Found");
        } else {
            return $value;
        }
    }

    //Done
    public function signupauthentication(REQUEST $req)
    {
        $name = $req->input("name");
        $emailname = $req->input('email');
        $pass = $req->input('password');
        $SQ = $req->input('SecQues');
        $Ans = $req->input('Answer');
        $Date = $req->input("date");
        $pic = $req->file('pic');

        // echo($pic);
        // echo($name);

        $postPrivacy = "Everyone";
        $MessagePrivacy = "Everyone";
        $FriendsPrivacy = "Everyone";

        $picName = $pic->getClientOriginalName();
        $pic->move('uploads', $picName);
        $destination = 'uploads/' . $picName;

        DB::insert('insert into user (username,Name,Password,Question,Answer,DataOfBirth,Bio,PostPrivacy,MessagePrivacy,FriendPrivacy,ProfileIMG) values (?,?,?,?,?,?,?,?,?,?,?)', [$emailname, $name, $pass, $SQ, $Ans, $Date, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", $postPrivacy, $MessagePrivacy, $FriendsPrivacy, $destination]);
        return redirect('/');
    }

    public function changename(REQUEST $req)
    {
        $name = $req->input('newname');
        $username = $req->input('usernameNameChange');
        DB::update("update user set Name = ? where username = ?", [$name, $username]);

        session(['name' => $name]);

        return redirect('/settings');
    }
    public function changebio(REQUEST $req)
    {
        $bio = $req->input('newbio');
        $username = $req->input('usernamebio');
        DB::update("update user set Bio = ? where username = ?", [$bio, $username]);

        session(['bio' => $bio]);

        return redirect('/settings');
    }

    public function changePP(REQUEST $req)
    {
        $PP = $req->input('newPP');
        $username = $req->input('usernamePP');
        DB::update("update user set PostPrivacy = ? where username = ?", [$PP, $username]);
        return redirect('/settings');
    }
    public function changeMP(REQUEST $req)
    {
        $MP = $req->input('newMP');
        $username = $req->input('usernameMP');
        DB::update("update user set MessagePrivacy = ? where username = ?", [$MP, $username]);
        return redirect('/settings');
    }
    public function changeFP(REQUEST $req)
    {
        $FP = $req->input('newFP');
        $username = $req->input('usernameFP');
        DB::update("update user set FriendPrivacy = ? where username = ?", [$FP, $username]);
        return redirect('/settings');
    }

    public function forgotpassword(REQUEST $req)
    {
        $username = $req->input('user');
        $newpass = $req->input('newpass');

        DB::update("update user set password = ? where username = ?", [$newpass, $username]);
        return redirect('/');
    }

    public function imagetest(Request $request)
    {
        $pic = $request->file('pic');
        $picName = $pic->getClientOriginalName();
        echo ($pic);
        echo ($picName);
        $pic->move('uploads', $picName);
        $destination = 'uploads/' . $picName;
        DB::insert("insert into `imagetest`(imagedata) VALUES ('$destination')");

        return view("index", ["display" => ""]);
    }


    public function settings()
    {
        $username = session('username');
        $name = session('name');
        $img = session('image');
        $data = DB::select('select * from user where username IN (SELECT Friend1 FROM friends WHERE RequestStatus = "Pending" and Friend2=?)', [$username]);
        return view('settings', ["NameOfUser" => $username, "image" => $img, "Name" => $name, "count" => count($data), "noti" => $data]);
    }

    public function deleteaccount()
    {
        $username = session('username');

        // Delete from Friends Table
        DB::delete("delete from friends WHERE Friend1= ? OR Friend2 = ?", [$username, $username]);
        //Delete from Messeges Table
        DB::delete("delete from messages WHERE sender= ? OR Receiver = ?", [$username, $username]);

        //Do this before unlinking
        $value = DB::select('select ImgRef from post where username = ?', [$username]);

        //To Delete the Pics from the server
        foreach ($value as $v) {
            if (file_exists($v->ImgRef)) {
                @unlink($v->ImgRef);
            }
        }
        //Delete from Posts Table
        DB::delete('delete from post WHERE username=?', [$username]);

        $value = DB::select('select * from user WHERE username = ?', [$username]);

        //To Delete the Pics from the server
        foreach ($value as $v) {
            if (file_exists($v->ProfileIMG)) {
                @unlink($v->ProfileIMG);
            }
        }
        // Delete from User Table
        DB::delete("delete from user WHERE username = ?", [$username]);

        return "Done";
    }


    public function signup()
    {
        return view('signup', ["display" => ""]);
    }
    public function forgot()
    {
        return view('forgotpassword');
    }

    //For the Home Page
    public function home()
    {
        $username = session('username');
        $name = session('name');
        $img = session('image');

        $data = DB::select('select * from user where username IN (SELECT Friend1 FROM friends WHERE RequestStatus = "Pending" and Friend2=?)', [$username]);

        return view('Home', ["NameOfUser" => $username, "image" => $img, "Name" => $name, "count" => count($data), "noti" => $data]);
    }

    public function profile($id)
    {
        $ownimg=session('image');
        $user = session('username');


        $data = DB::select('select username,Name,ProfileIMG,bio from user where username=?', [$id]);

        $username = $data[0]->username;
        $name = $data[0]->Name;
        $Profileimage = $data[0]->ProfileIMG;
        $bio = $data[0]->bio;
        $Images = DB::select('SELECT ImgRef FROM post WHERE username=?', [$id]);

        $data = DB::select('select * from user where username IN (SELECT Friend1 FROM friends WHERE RequestStatus = "Pending" and Friend2=?)', [$username]);

        return view('profile', ["NameOfUser" => $username,'user'=>$user,'ownimg'=>$ownimg, "image" => $Profileimage, "Name" => $name,"bio" => $bio, 'Images' => $Images, "count" => count($data), "noti" => $data]);
    }

    public function messages()
    {
        $username = session('username');
        $name = session('name');
        $img = session('image');
        $data = DB::select('select * from user where username IN (SELECT Friend1 FROM friends WHERE RequestStatus = "Pending" and Friend2=?)', [$username]);
        return view('messages', ["NameOfUser" => $username, "image" => $img, "Name" => $name, "count" => count($data), "noti" => $data]);
    }
    public function location()
    {
        $username = session('username');
        $name = session('name');
        $img = session('image');
        $data = DB::select('select * from user where username IN (SELECT Friend1 FROM friends WHERE RequestStatus = "Pending" and Friend2=?)', [$username]);
        return view('location', ["NameOfUser" => $username, "image" => $img, "Name" => $name, "count" => count($data), "noti" => $data]);
    }
    public function notifications()
    {
        $username = session('username');
        $name = session('name');
        $img = session('image');
        $data = DB::select('select * from user where username IN (SELECT Friend1 FROM friends WHERE RequestStatus = "Pending" and Friend2=?)', [$username]);
        return view('notifications', ["NameOfUser" => $username, "image" => $img, "Name" => $name, "count" => count($data), "noti" => $data]);
    }

    public function ajaxtest()
    {
        // // $value = DB::select('select * from user where username = ?', ["Aryan"]);
        // $emailname = $req->input('email');
        // $pass = $req->input('password');


        // // DB::insert('insert into user (username, password,Question, Answer) values (?,?,"What is your Name Mister?","Aryan")',[$emailname,$pass]);
        $value = DB::select('select username,password from user where username = ?', ["usamayaseen07@gmail.com"]);

        return $value;
    }

    public function ajaxtestpost()
    {
        $pass = REQUEST("data");
        $emailname = REQUEST("emailname");
        $Response = "";
        $value = DB::select('select * from user where password = ?', [$pass]);
        if (count($value) == 0) {
            $Response = 'Password Not Found';
        } else {
            if ($value[0]->password == $pass) {
                $Response = 'Password Found.';
            } else {
                $Response = 'Password Not Found';
            }
        }
        echo ("here");
        return $Response;
    }

    public function getFriends()
    {
        $id = session('username');
        $value = DB::select('select * FROM friends WHERE (Friend1=(?)  OR Friend2=(?)) AND RequestStatus="Accepted"', [$id, $id]);
        // $value = DB::select('select * FROM friends WHERE Friend1=(?) AND RequestStatus="Accepted"', [$id]);
        // echo(count($value));

        return $value;
    }

    public function getChat()
    {

        $currentuser = session('username');
        $otheruser = REQUEST("other");

        //Lolz Wrong Query xD AHAHAHAHAHHAHAHA
        // $value = DB::select('select * from messages where Sender=(?) or Receiver=(?)', [$currentuser,$currentuser]);
        $value = DB::select('select * from messages where (Sender=(?) and Receiver=(?)) or (Sender=(?) and Receiver=(?)) ORDER BY id', [$currentuser, $otheruser, $otheruser, $currentuser]);

        return $value;
    }

    public function sendmessage()
    {
        $sender = session('username');
        $receiver = REQUEST("other");
        $msg = REQUEST("MSG");
        DB::insert('insert into messages (`Sender`, `Receiver`, `message`, `id`) VALUES ((?),(?),(?),NULL)', [$sender, $receiver, $msg]);
    }

    public function getPost()
    {
        // $postdata = DB::select('select * from post order by id');

        //For Random Selection of Posts
        $postdata = DB::select('select * from post');

        if (count($postdata) == 0) {
            return "NONE";
        } else {
            return $postdata;
        }
    }
    public function addPost(REQUEST $req)
    {
        $text = $req->input('CreatePostTextArea');
        $usr = session('username');
        $pic = $req->file('pictoupload');

        $picName = $pic->getClientOriginalName();
        $pic->move('uploads', $picName);
        $destination = 'uploads/' . $picName;
        $datetime = date_create()->format('Y-m-d H:i:s');
        DB::insert('insert into post (id, username, Text,ImgRef,VidRef, Date) values (NULL,(?),(?),(?),(?),(?))', [$usr, $text, $destination, "NONE", $datetime]);

        return redirect("/Home");
    }
    public function search()
    {
        $username = session('username');
        $name = session('name');
        $img = session('image');
        $data = DB::select('select * from user where username IN (SELECT Friend1 FROM friends WHERE RequestStatus = "Pending" and Friend2=?)', [$username]);

        return view('search', ["NameOfUser" => $username, "image" => $img, "Name" => $name, "count" => count($data), "noti" => $data]);
    }


    public function searchbyname($Name)
    {
        $username = session('username');
        $data = DB::select(DB::raw("select * from user where Name like '$Name%' and username!='$username'"));

        if (count($data) == 0) {
            return "None";
        } else {
            return $data;
        }
    }
    public function getFriendReq($id)
    {
        $username = session('username');
        $value = DB::select('select * FROM friends WHERE (Friend1=? AND Friend2=?) OR (Friend1=? AND Friend2=?)', [$username, $id, $id, $username]);
        if (count($value) == 0) {
            return "Not Found.";
        } else {
            return $value;
        }
    }

    public function sendrequest()
    {
        $user = session('username');
        $sendreq = REQUEST('sendreq');
        DB::insert('insert into friends (Friend1,Friend2,RequestStatus) values (?,?,"Pending")', [$user, $sendreq]);
    }
    public function removefriend()
    {
        $user = session('username');
        $id = REQUEST('req');
        // $value = DB::select('select * FROM friends WHERE (Friend1=? AND Friend2=?) OR (Friend1=? AND Friend2=?)', [$id, $user,$user,$id]);
        DB::delete('delete from friends WHERE (Friend1=? AND Friend2=?) OR (Friend1=? AND Friend2=?)', [$id, $user, $user, $id]);
    }

    public function acceptreq()
    {
        $receiverofreq = session('username');
        $senderofreq = REQUEST('req');
        DB::update('update friends SET RequestStatus="Accepted" WHERE (Friend1=? and Friend2=?)', [$senderofreq, $receiverofreq]);
    }
}
