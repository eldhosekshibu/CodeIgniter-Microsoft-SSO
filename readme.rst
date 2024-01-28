###################
CodeIgniter Microsoft Authentication Library Documentation
###################
This library is a modular solution for integrating Microsoft login and logout functionality into CodeIgniter applications. It provides methods for initiating Microsoft authentication, handling callback responses, and logging out users.

*******************
Installation
*******************

•		Place the Microsoft_auth.php file in the application/libraries directory (already in the location in the git repo).
•		Place the microsoft.php file in the application/config directory.

************
Usage
************

•	Loading the Library:
Load the library in your controller.
		
	$this->load->library(‘microsoft_auth');

•	Loading the Config:
	$this->load->config(‘microsoft');

•	Replace configuration with your app credentials      Replace app credentials in microsoft.php(config/microsoft.php)
	
	microsoft_auth_app_id: Your Microsoft App ID.
	microsoft_auth_app_secret: Your Microsoft App Secret.
	microsoft_auth_redirect_uri: The callback URL where users are redirected after login.
	redirect_logout_uri: callback URL after logout

	To register an application login to your Microsoft Azure account and register an app. You can go to your App registration page using this link.

Link <https://portal.azure.com/#view/Microsoft_AAD_RegisteredApps/ApplicationsListBlade>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
