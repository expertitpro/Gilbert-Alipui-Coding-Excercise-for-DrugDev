# TrialNetwork DrugDev's coding exercise


This is Gilbert Alipui's solution to TrialNetwork's coding exercise Thank you for granting me the opportunity to tackle this challenge.  I have enjoyed working so much that I created a second version.  
This version features a more polished front-end UI built with Extjs, and employs my own hand-coded MVC framework on the back-end.

<b>How to View the Solution</b>

To view my solution, clone off a copy, and after renaming the folder to remove my name, store the resulting <b>Gilbert-Alipui-Coding-Excercise-for-DrugDev</b> folder in your web root and enter this link into the browser's address bar:  http://localhost/earnings_code_challenge

<b>The Problem:</b>  

Write code, in your choice of language, that takes as input a string and integer shift and returns that string encoded using a basic Caesar cipher.  

<b>Introduction:</b>

I chose to use Extjs 6 on the front-end, and PHP5 for this challenge because though it has a steep learning curve, Extjs provides unparalleled, polished and professional-looking UI components, and PHP is great for rapidly getting a prototype up and running.  
Also, my most recent front-end and back-end work has been with both Extjs and PHP so these were a natural choice for me.

I tried not to go overboard on any aspect.  I relied heavily on Extjs for visual aesthetics, and client-side validation to catch an empty textfield, and additional tests on the server-side, to block processing if for some reason unacceptable parameters or 
empty submissions get through, to avoid the dreaded division by zero!

Once the client-side validation is completed successfully, an Ajax call is made to the controller which handles the data, and performs the position salary search.  TODO (I plan to move data handling to the model, time permitting)

Naturally, I am open to working with Ruby on Rails, so it would be interesting to compare the level of effort between Ruby and PHP.

<b>My Solution Methodology:</b>

I researched the Caesar cipher algorithm.  I attempted to complete it, but ran out of time getting my solution to function properly, and eventually ran out of time so I adapted the Caesar cipher algorithm from: http://www.xarg.org/2010/05/cracking-a-caesar-cipher/ 

<b>Solution API</b>

My solution consists of three primary files.  

1. view.php
2. controller.php
3. model.php (To be implemented)


Thank you for this opportunity to tackle the TrialNetworks DrugDev code challenge.

Gilbert Alipui
