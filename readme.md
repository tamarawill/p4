#Project 4: SharedStuff Application
**Tamara Will** - tamara@tamarawill.com

## Links to Project:
**Live URL**:  
<http://p4.tamarawill.com>

To test admin functionality:   
UN: admin@sharedstuff.com  
PW: sharedstuff  

To test user functionality (or you can sign up for your own account):  
UN: user@sharedstuff.com  
PW: sharedstuff  

**Github Repository**:  
<https://github.com/tamarawill/p4>

**Demo**:  
demo link here

## Description:

SharedStuff is a web application designed to track the whereabouts of equipment shared among a small group of people. I work with a group of web developers, and we have a number of testing devices, as well as some A/V equipment for creating user tutorial videos. I have often wished I knew who had a particular piece of equipment, and this application is an attempt to solve this problem.

The application uses a mostly RESTful model for the following resources:
- Items (the pieces of equipment that are checked out
- Categories (what kind of item is it, e.g. a tablet)
- Users (the people who are using the items)
- Checkouts (each instance of a person "checking out" an item)

I styled the application using Bootstrap via CDN. I added a third-party widget (listed below) to implement date pickers on the site. I also used a local stylesheet to override/add to the Bootstrap styles.

## Libraries Used:

[**Bootstrap CSS:**](https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css)  
<https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css>

[**Bootstrap Theme:**](https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css)   
<https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css>

[**JQuery:**](https://code.jquery.com/jquery-2.1.1.min.js)  
<https://code.jquery.com/jquery-2.1.1.min.js>

[**Bootstrap Javascript:**](https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js)  
<https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js>

[**Moment.js**](https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js)  
(required for Eonasdan's Bootstrap Date/Time Picker)  
<https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js>

[**Eonasdan's Bootstrap Date/Time Picker**](https://github.com/Eonasdan/bootstrap-datetimepicker)  
<https://github.com/Eonasdan/bootstrap-datetimepicker>  
Files associated with this library within the application:
- /css/bootstrap-datetimepicker.min.css
- /js/bootstrap-datetimepicker.min.js

