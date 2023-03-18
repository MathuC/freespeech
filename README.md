# FreeSpeech

[FreeSpeech](https://mathusan.net/FreeSpeech/login.php) is an instant messaging system with double encryption. Only the sender and the recipient have the power to decrypt a message. Even we don't have the power to decrypt your messages or ever know your password. It is also very user friendly since everything is done in the background. The encryption/decryption key (Hash Encryption Key: HEK) is stored inside the user's browser (unlike session variables or cookies which the server has access to) until they close the tab so it is very secure and even we don't have access to the HEK.

There is also a feature in the homepage called WorldChat which is like a groupchat for the world where every users can interact with each other instantly. Those messages are not encrypted since any user that is registered can accesss those.

All the logos/images/audios were made by me (drawn or made usig liscenced software).




## Components
_Most files were never uploaded here (30 files in total and only 10 files here) since a lot of the files are used to encrypt/decrypt messages and also hash and encrypt the passwords which aren't appropriate to publish online._

`login.php` is the login/registration page.

`home.php` is the homepage where there is WorldChat, where every user can interact which each other 

`error.php` is an error page

`notification.php` is the page where users can see the other users with which they started conversations and the number of unseen messages

`profile.php` is the page that generates profiles of other users but also the user's profile

`edit.php` is the page the the user uses to edit their profile page

`search.php` is the page that shows the search results when the user searches usernames
