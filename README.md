# RegInfo

RegInfo is a Website containing three different sides.

**Listing** 
A page with a carroussel, you can navigate and choice a France Region, by clicking on the button, or simply searching by filling the text input.
After this, you arrive on the second part of the website.



**News** 
At this place, you can find a lot of things about the region you searched.
It means, you can see the various news about it, the news of several websites containing actualities concerning the region.

**Administation**
There, by an authentification, you can modify the path of regions' pictures, name,link and cssSelector of the medias. More over, you can delete these medias. Finally, you have the possibility to add new medias by selecting a region and specifying his name, his link and his cssSelector.


**Commit**
-Data recovery made from js
-the POST media method return the id of the media in the db
-Modifications on the medias or the regions made the DOM being modified (no reloading needed) 


TO DO : 
- ? (add verification before modify or add a media/region : link must include "http....", ect...)
- fix the css : the height of .infoRegion is not the same as the .medias one
- Make the authentification page to access to the administrator pannel