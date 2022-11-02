const BlogPost = require('../models/BlogPost.js')
const path = require('path')

//POST request route - 'body' is POST response
module.exports = (req,res)=>{
let image = req.files.image;
image.mv(path.resolve(__dirname,'..','public/img',image.name),async (error)=>{
await BlogPost.create({
...req.body,
image: '/assets/img/' + image.name,
userid: req.session.userId
})
res.redirect('/')
})
}
