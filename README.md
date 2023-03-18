# FreeSpeech

## Introduction
FreeSpeech is an instant messaging system with double encryption. Only the sender and the recipient have the power to decrypt a message. Even we don't have the power to decrypt your messages or ever know your password. It is also very user friendly since everything is done in the background. The encryption/decryption key (Hash Encryption Key: HEK) is stored inside the user's browser (unlike session variables or cookies which the server has access to) until they close the tab so it is very secure and even we don't have access to the HEK.

There is also a feature in the homepage called WorldChat which is like a groupchat for the world where every users can interact with each other instantly. Those messages are not encrypted since any user that is registered can accesss those.

All the logos/images/audios were made by me (drawn or made usig liscenced software).

Try it out here: [FreeSpeech](https://mathusan.net/FreeSpeech/login.php)


## Components
_Most files were never uploaded here (30 files in total and only 10 files here) since a lot of the files are used to encrypt/decrypt messages and also hash and encrypt the passwords which aren't appropriate to publish online._

`login.php` is the login/registration page.

`home.php` is the homepage where there is WorldChat, where every user can interact which each other 

`error.php` is an error page

`notification.php` is the page where users can see the other users with which they started conversations and the number of unseen messages

`profile.php` is the page that generates profiles of other users but also the user's profile

`edit.php` is the page the the user uses to edit their profile page

`search.php` is the page that shows the search results when the user searches usernames

`style.css` is a very big file for this project since the  aesthetics is very important for a social media page.


## Big Changes

#### 9/08/2020
I made a log in and sign up page just to try out the bootstrap CSS framework. It was messy but I didn't really have the idea for FreeSpeech yet.

#### 14/08/2020
I built WorldChat on the homepage, a instant chat for every users logged in. The name of the website was WorldChat at the time.

#### 15/08/2020
I hashed the password with a salt in the database so that even I don't have access to the passwords of the user to give the users privacy and so that if the database is somehow hacked, that the hackers don't see the passwords in plaintext.

#### 20/08/2020
I read on the news that messenger stores our messages in plaintext which gave me the idea to start making a one-to-one instant messaging system that's double encrypted and only decryptable by the sender and the receiver, so that even if the database is hacked, it was extremely hard to decrypt messages. Also, another motivation was that if my friends message each other in my app, that even I, the guy who coded the whole thing couldn't decrypt any messages where I wasn't the sender or the receiver, to give the full power to the users and that they don't need to trust anyone but themselves. I spent a lot of time that day thinking, writing and sketching how to implement encryption in a user-friendly way so that the users don't need to type a password over and over to decrypt messages or memorize multiple passwords.

#### 21/08/2020
Finished implementing the encryption of messages.

#### 21/08/2020
Finished implementing the decryption of messages. 

#### 21/08/2020
Used AJAX to make it so that when a user posts a message, it uses AJAX to update the page while also updating the database with the twice encrypted message instead of encrypting the messages twice and sending it to the database and then __reloading__ the page.

#### 21/08/2020
Made error pages and about pages.

#### 22/08/2020
Fixed some bugs regarding the encryption of the message

#### 22/08/2020
I was storing the HEK as a session variable which is destroyed when the browser is closed (or so I thought). Then, I started doubting this method, since the session variable is easily accessible through the server. If the HEK is accessible through the server for the __whole__ time the user is online, it might not be a very secure way to temporarily store it. I could easily log in to see who is online, then go in the server and retrieve the HEK. I wouldn't do that, but the user doesn't have to trust me and it would defeat the whole purpose of having an HEK if it was not securily stored somewhere only they can access.\
Furthermore, new browsers like the new version of Chrome stopped destroying sessions even after you close the browser, which means that the session variables aren't destroyed either. So, it is possible your key is saved on the server for a very long time even after you close the browser which makes using session variable an extremely bad idea.\
I searched online for different local storage methods and stumbled accross sessionStorage and localStorage variables. sessionStorage variables are stored on the user's browser and are destroyed when they close the __tab__. It was so secure, so I spent an hour changing the code so that the HEK is stored locally on the user's machine, where I have 0 access. This was extremely secure and user-friendly and I was very happy with this solution.

#### 22/08/2020
I finished the notification.php page which lists all the user which you have a ongoing conversation with and the number of unseen messages which is done with javascript functions that parses the JSON data returned by the php script and counts the number of unseen messages for each user.

#### 25/08/2020
Fixed some bugs concerning users who open a new tab while a session is active which destroys the sessionStorage HEK, so when they do that and then try to view or post message, it logs them out automatically and sends them to an error page explaining what just happened and that letting them do that might cause security breaches. I added javascript lines but also server-side lines so that even if the javascript is modified, it still does the same thing.

#### 26/08/2020
I added AJAX calls every 500ms on every page that checks if there are any new messages where the user is the receiver and when they do, a little number appears next to the `message` button (in the top of the page) that indicates how many unread messages the user has and this is also accompanied with a little alert sound like in most social media apps.

#### 26/08/2020
I made a python script to change database information with the press of a button instead of manually changing the database information on around 30 different files everytime I made a modification to the website on my local server and needed to upload the files online.

#### 1/09/2020
I made WorldChat available to guests on the LOGIN/REGISTER page so they get a preview of the website which gives a little more incentive to register/login to see "MORE".

#### 26/09/2020
I also encrypted the worldchat messages before adding them to the database to add another layer of security, but mainly so that emojis work for any server and that I don't need to add different code for different type of servers for them to work (relating to utf8 and utf8mb4 encoding). This feature seems redundant but makes the process of moving this website from one server to another a lot more easier.