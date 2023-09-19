# COMPX222As3COMPX222 Assignment 3 (25%)
For this assignment you will create a dynamic website using HTML, CSS, JavaScript, and PHP. The
aim is to code everything yourself so you understand how it works. Therefore, you are not
permitted to use any tools like Dreamweaver or similar that automatically generate
HTML/CSS/JavaScript/PHP. However, you may use JavaScript libraries if you like, as long as all
dependencies are included in your website’s folder. You should ensure all code that you do create
is formatted tidily and is easily readable. Make sure that you organize your website into
directories properly. The website should consist of a top-level directory containing a file called
index.php that is the website’s default page, and then appropriate subdirectories for further file
types.
For submission, zip your entire folder up and submit it as a single file on Moodle before the
deadline.
The task:
The SOFA (Sequential Organ Failure Assessment) score is a risk assessment that is performed by
medical staff for patients admitted to ICU. It is used to estimate the risk of mortality due to
sepsis. Essentially, the score is calculated multiple times during a patient’s first 96 hours in ICU.
The higher the score, the more at risk of mortality a patient is.
Your job is to implement a SOFA score calculator using PHP, JavaScript, CSS and HTML.
The Wikipedia page (https://en.wikipedia.org/wiki/SOFA_score) on SOFA gives a pretty good
summary of how the score is calculated. There are 6 main inputs to the score:
1. “Respiratory System” which has a numeric input and a binary input
2. “Nervous System” which is one numeric input
3. “Cardiovascular System” which has five possible numeric inputs, but they do not all
need to be entered
4. “Liver” which is numeric
5. “Coagulation” which is numeric
6. “Kidneys” which is numeric
The Wikipedia page lists details of the actual components and shows how they are used to
increment the SOFA score. The final SOFA score is a sum of the sub-scores of each of the six
components.
You should first of all think about how you would design a form to enter all of this information
in a valid easy-to-read/use way. The SOFA score cannot be calculated unless all required
information is entered properly. JavaScript or savvy input controls can be used to ensure this.
Note that this is straightforward for most of the subscores but subscore 1) and 3) present some
UI complexity.
A diagram illustrating how information should flow between pages on the server and the user’s
local cookies is shown here:
A description of each page:
index.php
The default webpage that gives the user a brief overview of what SOFA is (no more than 1
paragraph) and prompts the user to enter a (i) an NHI number, (ii) patient surname, (iii) patient
first name. All values must be entered, and the NHI number should conform to the pattern
AAANNNN where A=uppercase letter and N=digit. Use a regular expression to validate the NHI
number. The cookies “patient-nhi”, “patient-surname”, “patient-firstname” may already exist on
the client PC, and if this is the case, then the control values should be auto populated from the
cookies. We will check this by visiting the page, entering patient details, clicking submit, then
closing the browser and opening index.php again to see if the patient details are remembered.
Clicking submit on this page generates a POST request that passes the values of the three controls
to the server and takes the user to…
sofa.php
This page contains your form for implementing the SOFA score. It should receive via a POST
request the patient NHI, surname and firstname, and display these at the top of the page. The
Update
patient
details
POST
(subscores)
Index.php
(input patient
firstname/surname
/nhi)
Sofa.php
(input six
subscores)
Result.php
(show subscores
and final score)
POST (patient
details)
local
cookies
Read patient
details if exists
Read patient
details
first thing the PHP should do is set the cookies “patient-nhi”, “patient-surname”, and “patientfirstname” on the client PC. The user then enters the correct information for the six components
of the SOFA score and clicks submit, which generates a POST request that passes the subscores
for all six components to the server and takes the user to…
result.php
This page performs the overall score calculation and displays the result. It should nicely display
the values of each of the six components so that the user can see how the final score was
calculated. Patient NHI, surname and firstname should be retrieved from the cookies and
displayed at the top of the page.
Further notes:
● make sure you use external CSS for all pages in your website
● you can use JavaScript libraries for this assignment but should make sure that any
libraries are included in your JavaScript folder
● all calculations and cookie manipulation should be done in PHP; only use JavaScript for
UI and validation
● we will test your assignment on the latest version of Firefox (client side) and using the
webapp webserver set up for 222 (server side)
● make sure that all file references are relative
A good strategy for solving this assignment is to first of all design the three key pages, then link
them with POSTs, using PHP to extract and display the relevant information from $_POST, and
finally add the PHP code to deal with the local cookies where default user information is stored.
Note that cookies are not very secure here since the user’s name and NHI number would be
stored locally in the browser’s cookies directory, which means other website or programs could
get that information. A more secure approach would be to use a session. You may use sessions
instead of cookies if you want to.
Marking scheme out of 25:
● index.php validation correct [ use of regular expressions] (2)
● index.php autopopulation from cookies/session variables works (5)
● index.php POST to sofa.php works (we see patient details on sofa.php) (5)
● sofa.php has suitably designed form/controls and validation (5)
● sofa.php POST to result.php works (we see the subscores and total on result.php) (5)
● external CSS used, and the styles look good and consistent across all pages (3)