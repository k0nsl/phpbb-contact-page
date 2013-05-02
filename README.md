Based on code by Douglas Lovell's PHP e-mail validation from 2007 and some code by Ben Lind.

I have tried to somewhat modernize the code and also tried to make it more secure. If there is anything I forgot, please notify me about the issue.

Instructions on using this with phpBB:

Copy the files "contact.php", "kontakt.php" and folders "css" and "javascripts" to the root of where the phpBB files are located. Copy "contact_body.html" to whatever template you're using (in effect: to your /styles/whatever-theme/template).

Add these lines:

   <link rel="stylesheet" href="/css/contactstyle.css" type="text/css" />
 
    <script type="text/javascript" src="/javascripts/jquery.min.js"></script>
    <script type="text/javascript" src="/javascripts/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/javascripts/jquery.form.js"></script>
    <script type="text/javascript" src="/javascripts/contact.js"></script>
    
To your "overall_header.html" file (located in your theme's template directory).

That's it, you're done. You can now put a link to "contact.php" in your forum navigation. I'd probably advice adding some sort of anti-spam code to this or only make it available to registered members.