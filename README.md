# Finding Fun in Fredericksburg
Created by Sandra Shtabnaya, Sabine Wills and Jess Thomas.
The final product is no available online.

## Interface Description

Finding Fun in Fredericksburg is a travel website devoted to providing tourists and residents with information about various locations to visit in the Fredericksburg, Virginia area. It allows all users to search for destinations according to category(ies) (entertainment, food and shopping), and examine the address, average rating and individual reviews of each search result.


### Food
The food category narrows search results to locations such as restaurants, ice cream parlors, fast food joints and other places that serve food.

### Entertainment
The entertainment category returns locations that provide entertainment, such as arcades, theaters or art galleries.

### Shopping
The shopping category provides locations where users can purchase products, such as in malls, bookstores or antique shops.

## Audience

We intend Finding Fun in Fredericksburg to benefit an adult audience. College students and other young adults can use the site to find and help others find locations where they can hang out with friends or immerse themselves in Fredericksburg’s culture. Older adults and travelers can use our interface to look for places to relax after work or spend quality time with kids and family members.

## Users

### Guest Users

Anyone without a logged-in account on Finding Fun in Fredericksburg will only be able to use the website’s search tool to locate, view and rate destinations in our database. Features such as modifying personal reviews and suggesting destinations will be unavailable without registration. Guest users can do the following.

#### Create
Guest users can only anonymously rate and/or write new reviews for an already existing location. If guest users find errors within the database, they can report those errors to the admin. However, they cannot add new locations to the website or offer suggestion for new database entries.

#### Read
Guests can view the names, addresses and reviews of all destinations in the database. However, they cannot read user suggestions

#### Update
Guests cannot edit their own reviews and ratings. They cannot update existing destinations in the website.

#### Delete
Guest users cannot delete their own reviews. They cannot delete locations or other reviews within the website.

### Registered Users

In addition to searching our database for the reviews, ratings and addresses of stored locations, logged-in users have permission to do the following.

#### Create
Registered users can only rate and/or write new reviews for an already existing location. They can suggest new locations that the admin can add to the database. If registered users find errors within the database, they can report those errors to the admin. However, they cannot add new locations to the website.

#### Read
Registered users can view the names, addresses and reviews of all destinations in the database. They can also view a list of their own reviews. However, they cannot read the suggestions of all users.

#### Update
Registered users can only edit their own reviews and ratings. They cannot update existing destinations in the website.

#### Delete
Registered users can only delete their own reviews. They cannot delete locations or other reviews within the website.

### Administrators

In addition to viewing locations in the database, website admins have the following capabilities.

#### Create
Admins are able to add new entries to the database. This can be recently opened locations or simply places suggested by other users that have not yet been added to the website. Admins are unable to create reports or suggestions, but they can write reviews.

#### Read
Admins can read the names, addresses and reviews of all destinations in the database. They can view all user suggestions for new locations.

#### Update
If admins find errors within the database, they can edit the erroneous fields. Just like registered users, they can edit their own reviews and ratings.

#### Delete
Admins can delete user suggestions, offensive reviews or invalid destinations, such as locations that have gone out of business.

## Interface Design

### Registered User Homepage
This feature has not been implemented.

Once a registered user logs in, they will automatically be redirected to a dashboard that contains a list of all of their reviews. From there, users have the option to edit any of their reviews by clicking on the “Edit” button under each individual review. If they choose to edit, they will be taken to the edit review page. Users can also click on the “Add a Review” button to submit a new review, which will take them to the add review page. Additionally, the dashboard contains an “Edit Settings” button that links to the edit settings page. The final button is the “Suggest Locations” button which will open the add suggestion page. 

### Add Review Page
This feature has not been implemented.

The add review page contains a form that allows the user to add a new review for an existing destination. It asks the registered user to provide a rating (1 - 5 stars) and an optional review. The add review page is only accessible when a registered user clicks on the “Add” button next to a particular search result.

### Edit Location Page
This feature has not been implemented.

The edit location page contains a form that allows the administrator to edit the particular values of a location submitted within the website. The administrator can access this page after clicking the “Edit” button in the admin view of the search page. This will allow the information from that row to be shown in the displayed columns. They will be put into text boxes that can be altered by the administrator to update whichever row that they have chosen. Once that change has been made to the satisfaction of the administrator, they can click the “Save” button and it will save the value into the appropriate table in the database. The administrator can save however many cells that they need to edit at a time.

### Add Suggestion Page
This feature has not been implemented.

Accessible from the user homepage, this page will allow the user to suggest a new location to be added to the database. The user will fill in the name, the category, and the address of the location as well as a reason that they think the location should be added. They then will be allowed to click the “Add” button, which will submit the location to the administrator. The information would be transferred to the administrator, which would auto-populate the “Add Data” page if the admin chooses to “Add” it from the admin homepage. 

### Admin Homepage
This feature has not been implemented.

Once logged in, the administrator will be redirected to the admin homepage, which contains a list of all suggestions submitted by registered users. The admin can add or delete any particular suggestion by pressing the “Add” or “Delete” button next to each row. If they choose to add, the admin will be redirected to the “Add Location” page, whose form fields will be auto-populated with information from the suggestion. The suggestion’s full information, including the address and category (not visible on the admin homepage) will auto-populate the add location page. Otherwise, if they press “Delete,” a little dialog box will pop up asking the admin to confirm, and the suggestion will afterwards be removed. The admin homepage also contains an “Add Location” button to add any other destination they so choose, independent of user suggestions. This will also link to the add location page, but without the form’s fields filled in. Just like the registered user’s homepage, the admin homepage has a section devoted to editing account settings. Clicking the “Edit Settings” button here will redirect the admin to the “Edit Settings” page.

### Edit Review Page
This feature has not been implemented.

This page will allow registered users to edit a published review for a particular location. It is opened when the “Edit” button is clicked on the user home page’s display of the different submissions the user has already made. The page will feature a less condensed version of the submission review box on the user homepage. The user will be allowed to edit the review given and the comment made, but not the date they submitted or the location that they submitted about. The date should stay the same for obvious reasons, but the location must stay the same so that users don’t accidentally remove the name of the place and change that very important piece of data.

### Add Location Page
This feature has not been implemented.

The “Add Location” page can only be accessed from the admin’s homepage, after clicking on the “Add” location button. It contains a form that prompts the admin for the location name, category (more than one is possible), and address (street, city, state and zipcode). The admin can also, optionally, write a review and rating. Once the “Add” button is pressed, the information is added as a location into the website’s database.

### Report Error Page
This feature has not been implemented.

The report error page contains a form that asks the user what information was incorrect in a particular search result (address or location name). Here, the user will also be prompted to describe the error and give feedback so that the admin can make updates.

### Search Page

The search page contains a form that allows users to find a desired location within the website. It contains options that allow guests or registered users to search by category. By default, the first category is chosen, but the user can change categories or select more than one. Once the search is entered and the “Search” button pressed, the user will be directed to the search results page.

### Search Results Page
This feature has been partially implemented.

The search results page displays the user’s search results from a query entered into the initial search bar. Each result describes the location’s name, average rating and address. Like the reviews page, the user (guest or registered) has the option to filter the results by pressing the buttons below the search result heading, which will list only reviews of a particular rating. Registered and guest users are able to report errors and rate each search result. They can also click the “See Reviews” button to go to the “Reviews” page for that particular result. In addition to these buttons, administrators have a “Delete” and “Edit” button to delete or edit a particular result. The search bar is provided for convenience, if the user wishes to search again after reading the results.

### Reviews Page
This feature has been partially implemented.

The reviews page for a particular search result can be accessed by pressing the “See Reviews” button for the destination within the “Search Results” page. It contains a list of all of the user submitted reviews for one location entry. The user (guest or registered) has the option to filter the reviews at the top of the page by pressing the buttons, which will list only reviews of a particular rating. By default, all the reviews are listed and ordered by date, with the newest reviews placed first. Each review contains the username of the publisher, the rating (in stars) and the written review (if any). If the user is the admin, then each review also has a “Delete” button beneath it, allowing them to delete any inappropriate review.

