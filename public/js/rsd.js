/*
This Site is developed By
Name: Rahul Gupta
Contact : 8581843939
Website: rahulkrgupta.netlify.app
*/

const devName = "Rahul Gupta - Software Developer";
const devContactNumber = "8581843939";
const devWebsite = "Software Developer | India | Delhi- 11041";
// Encode the name in Base64
const base64Name = btoa('Name: '+ devName + ' Contact:' + devContactNumber + ' Website:' + devWebsite);
// Output the Base64 encoded name
console.log(base64Name);
console.log("%cDeveloped by "+ base64Name , "color: green; font-size: 16px;");