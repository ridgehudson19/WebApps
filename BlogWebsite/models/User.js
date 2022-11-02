//require for 'mongoose' - for mongodb model
const mongoose = require('mongoose')
const Schema = mongoose.Schema;

//require for 'validator'
var uniqueValidator = require('mongoose-unique-validator');

//require for password encrpytion
const bcrypt = require('bcrypt')


//build table schema
const UserSchema = new Schema({
username: {
type: String,
required: [true, 'Please provide username'],
unique: true
},
password: {
type: String,
required: [true, 'Please provide password']
}
});

//validator - turns unique error (E11000) into validation error
UserSchema.plugin(uniqueValidator);

//encrypt password
UserSchema.pre('save', function(next){
	   const user = this
	   
	   bcrypt.hash(user.password, 10, (error, hash) => {
	      user.password = hash
	      next()
	})
})

//export model
const User = mongoose.model('User',UserSchema);
module.exports = User
