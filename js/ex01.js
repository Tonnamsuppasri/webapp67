const matches = (obj, source) => Object.keys(source).every(key=>obj.hasOwnProperty(key)&&obj[key]===obj[key]===source[key]);
console.log(matches({age:30,hair:'long',bread:true},age=25));
console.log(matches({age:30},{age:30}));


document.write(matches({age:30,hair:'long',bread:true},age=25)+"<br>");
document.write(matches({age:30},{age:30}));