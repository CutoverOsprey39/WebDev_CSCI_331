// cntrl+C to stop the server and restart to see changes
// common js require() .js version
//const express = require('express')
//mjs version .mjs version
import express from 'express'
const app = express()
const port = 3050 //my port number 3050 same as db id

app.get('/', (req, res) => {
  res.send('Hello World from Express!!!')
})

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})

//npm init -y creates json
//npm install express
//npm install -D nodemon - a dev dependency for auto-restarting server on changes
//"start": "nodemon express-server.mjs" in package.json scripts to run with nodemon -modules manifest*
//npm start to run the server with nodemon 
// use nodemon to auto-restart server on changes, run using: npm run dev (in terminal)