const mongoose = require('mongoose')
const BlogPost = require('./models/BlogPost')
mongoose.connect('mongodb://localhost/my_database', {useNewUrlParser: true});

//BlogPost.create({
//title: "The Mythbuster’s Guide to Saving Money on Energy Bills",
//body: "If you have been here a long time, you might remember when I went on ITV Tonight to dispense a masterclass in saving money on energy bills. Energy-saving is one of my favourite money topics, because once you get past the boring bullet-point lists, a whole new world of thrifty nerdery opens up. You know those bullet-point lists. You start spotting them everything at this time of year. They go like this"
//}, (error, blogpost) =>{
//console.log(error,blogpost)
//});

//BlogPost.find({body:/more/}, (error, blogspot) =>{
//console.log(error,blogspot)
//});


var id = "6316979e00ae0e110ba4ecb9";


//BlogPost.findById(id, (error, blogspot) =>{
//console.log(error,blogspot)
//})

BlogPost.findByIdAndUpdate(id,{
title:'Updated title 4'
}, (error, blogspot) =>{
console.log(error,blogspot)
})

//BlogPost.findByIdAndDelete(id, (error, blogspot) =>{
//console.log(error,blogspot)
//})