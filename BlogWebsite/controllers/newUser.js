module.exports = (req, res) =>{
	// render register.ejs - get validation errors from storeUser.js
	res.render('register',{
	   errors: req.flash('validationErrors')
	}) 
}
