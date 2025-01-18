# FreeSpeech
[FreeSpeech](https://mathusan.net/FreeSpeech/login.php) is an Instant Messaging System with Double AES-256 encryption that I designed and built from scratch. It is user friendly since all encryption and decryption is seamlessly done in the background. Only the sender and the recipient have the power to decrypt a message, the server can't decrypt users' messages. The encryption/decryption key (Hash Encryption Key: HEK) is stored in the cient's browser using the sessionStorage feature (unlike session variables or cookies which the server has access to) until they close the tab.

There is also a feature in the homepage called WorldChat which is like a groupchat for the world.

All images, and audio assets in this project were created by the author.

## Components
_Most files aren't uploaded here since a lot of the files are used to encrypt/decrypt messages and also hash and encrypt the passwords which aren't appropriate to publish online._

`login.php` is the login/registration page.

`home.php` is the homepage where there is WorldChat, where every user can interact which each other 

`error.php` is an error page

`notification.php` is the page where users can see the other users with which they started conversations and the number of unseen messages

`profile.php` is the page that generates profiles of other users but also the user's profile

`edit.php` is the page the the user uses to edit their profile page

`search.php` is the page that shows the search results when the user searches usernames
