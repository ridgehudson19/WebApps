//express module
const express = require('express')
const app = new express()

//ejs - embedded javascript module
const ejs = require('ejs')
app.set('view engine','ejs')

//mongoose - mongodb module
const mongoose = require('mongoose');
mongoose.connect('mongodb://localhost/my_database', {useNewUrlParser: true});

//use public folder for css/js/images
app.use(express.static('public'))

//body-parser module - used for POST request
const bodyParser = require('body-parser')
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended:true}))

//express file image upload module
const fileUpload = require('express-fileupload')
app.use(fileUpload())

//middleware - validates 'new post' form
const validateMiddleWare = require("./middleware/validationMiddleware");
app.use('/posts/store',validateMiddleWare)

//middleware - express sessions
const expressSession = require('express-session');
app.use(expressSession({

//this will work for now - use .env file 
//in .env file; SECRET="This is my secret sentence"
//in app.js; secret: env.get("SESSION_SECRET")
secret: "Some random guy on StackOverflow said I need a long sentence and its better than a UUID so here ya go."
}))


//middleware - check if logged in before user can access 'new post' page
const authMiddleware = require('./middleware/authMiddleware');

//middleware - checked if logged in before user can access 'login' and 'register' pages
const redirectIfAuthenticatedMiddleware = require('./middleware/redirectIfAuthenticatedMiddleware')


//connect-flash require and middleware - used for clearing error messages
const flash = require('connect-flash');
app.use(flash());


//conditionally display new post, login, new user links
// the star(*) means use this middleware with every request
global.loggedIn = null; //setting a global variable for EJS files
app.use("*", (req, res, next) => {
loggedIn = req.session.userId;
next()
});


//controller requires
const newPostController = require('./controllers/newPost')
const homeController = require('./controllers/home')
const storePostController = require('./controllers/storePost')
const getPostController = require('./controllers/getPost')
const newUserController = require('./controllers/newUser')
const storeUserController = require('./controllers/storeUser')
const loginController = require('./controllers/login')
const loginUserController = require('./controllers/loginUser')
const logoutController = require('./controllers/logout')

//start server - listen on port 4000
app.listen(4000, ()=>{
console.log('App listening on port 4000')
})

//page routing
app.get('/',homeController)
app.get('/post/:id',getPostController)
app.get('/posts/new', authMiddleware, newPostController)
app.get('/auth/register',redirectIfAuthenticatedMiddleware, newUserController)
app.get('/auth/login', redirectIfAuthenticatedMiddleware, loginController)
app.get('/auth/logout', logoutController)

app.post('/posts/store', authMiddleware, storePostController)
app.post('/users/register', redirectIfAuthenticatedMiddleware, storeUserController)
app.post('/users/login', redirectIfAuthenticatedMiddleware, loginUserController)

app.use((req, res) => res.render('notfound')); 
