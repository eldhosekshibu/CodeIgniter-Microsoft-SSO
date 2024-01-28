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

	To register an application login to your Microsoft Azure account and register an app. You can go to your App registration page using this link: https://portal.azure.com/#view/Microsoft_AAD_RegisteredApps/ApplicationsListBlade

*********
Customise Welcome Controller and Views according to your logic
*********
Welcome controller has three functions - Login, callback function and Logout. Change the code according to your need.

Notes
•	This library is designed for Microsoft login and logout functionality. Adapt it as needed for your specific requirements.
•	Check the official Microsoft Identity Platform documentation for the latest updates and best practices.
