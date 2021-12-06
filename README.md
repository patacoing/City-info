# RegInfo

RegInfo is a Website containing two different sides.

**Listing** 
A page with a carroussel, you can navigate and choice a France Region, by clicking on the button, or simply searching by filling the text input.
After this, you arrive on the second part of the website.



**News** 
At this place, you can find a lot of things about the region you searched.
It means, you can see the various news about it, the news of several websites containing actualities concerning the region.


**Commit**
-Documentation in the class Files
-modification of the system for the scrapping : added a key cssSelector in the json file
-added for the text input cssSelector in update_json.php
-for the scrapping : cssSelector is needed to be in parameter of the filter method
-Data transfered from the json file to a Mysql DB by using the insertionBdd.php script
-Creation of the API, routes : regions, medias
-Implementation of the differents methods

TO DO : 
-need to update the cssSelector of news already present
-Test the scapping on the differents regions
-Implement the put methods 
-Recover the cssSelector for each region and scrap the articles on the websites
