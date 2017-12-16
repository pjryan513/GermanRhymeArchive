<html>
	<head>
		<style>
			body{background-color: #cccccc;}
		</style>
	</head>
	<body>
		<h1> PATRICK, JARED, & KIAN </H1>
		<ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">What command can you type to see if apache is running </span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">sudo apachectl start</span></li>
			</ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">What is the difference between the GET, POST, and HEAD commands?</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">GET: will fetch an existing resource.</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">POST: will create a new resource</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">HEAD: will retrieve the server headers. &nbsp;Like GET but has no message body.</span></li>
			</ul>
		</ul>
		<p>&nbsp;</p>
		<ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">What is the difference between the ServerRoot and the DocumentRoot</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">The top of the directory tree under which the server's configuration, error, and log files are kept</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">DocumentRoot is the path to your files that are delivered by the server</span></li>
			</ul>
		</ul>
		<p>&nbsp;</p>
		<ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">What port does your web server listen to for HTTP connections from browsers by default?</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Listening to port 80</span></li>
			</ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">In what directory do you need to place all your HTML and PHP files for apache to serve them up</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">/etc/var/www</span></li>
			</ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">What file contains all of Apache's traffic logs? What about apache's error logs? Navigate to the traffic logs and open it up. Is the last access from one of your machines?</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Error logs are in /etc/var/log/apache2</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Traffic (access) logs are also in &nbsp;/etc/var/log/apache2</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Looks like the last access was from Jareds </span></li>
			</ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">What is a </span><em><span style="font-weight: 400;">Directory Index</span></em><span style="font-weight: 400;"> file? Why would it be nice to have one in each directory?</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">When a directory listing of files is displayed on an actual webpage. It&rsquo;d be nice to have one in each directory to make navigating the directory easier.</span></li>
			</ul>
			<li style="font-weight: 400;">How do you give every user on your linux server their own web space</li>
			<ul> 
				<li style="font-weight: 400;">Need to enable the UserDir, then create a directory within home that will be used as the file directory for the user Ubuntu. Then need to change the directory path such that it is mapped to the newly created directory in home</li>
			</ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">How do you create a password-protected directory (like I did for the class notes)? Look into </span><em><span style="font-weight: 400;">htpasswd</span></em><span style="font-weight: 400;"> and </span><em><span style="font-weight: 400;">.htaccess</span></em><span style="font-weight: 400;">files.</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Create password file</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Use the command:</span><span style="font-weight: 400;"> sudo htpasswd -c /etc/apache2/.htpasswd </span><span style="font-weight: 400;">username. </span><span style="font-weight: 400;">Then its asks to give a password then confirm it. You can view user and encrypted password by using the command: </span><span style="font-weight: 400;">cat /etc/apache2/.htpasswd</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Configure the access control</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Use: sudo nano /etc/apache2/apache2.conf. Then under Directory /var/www change AlllowOveride from None to ALL. Then create .htaccess file wherever you want the password (example sudo nano /var/www/html/.htaccess) Then within the file put </span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">AuthType Basic</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">AuthName "Restricted Content"</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">AuthUserFile /etc/apache2/.htpasswd</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">Require valid-user</span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">Then restart server and it should be working </span></li>
			</ul>
			<li style="font-weight: 400;"><span style="font-weight: 400;">How do </span><em><span style="font-weight: 400;">you</span></em><span style="font-weight: 400;"> do the automatic redirect given a 404 error?</span></li>
			<ul>
				<li style="font-weight: 400;"><span style="font-weight: 400;">In .htaccess put: </span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">RewriteEngine On </span></li>
				<li style="font-weight: 400;"><span style="font-weight: 400;">ErrorDocument 404 /path/to/redirect/to</span></li>
			</ul>
		</ul>
		<p>&nbsp;</p>

		<img src="https://uproxx.files.wordpress.com/2016/02/entire-bee-movie-script-on-t-shirt.jpg?quality=100&w=650" alt="W3Schools.com" style="width:600px;height:200px;">
	</body>
</html>
