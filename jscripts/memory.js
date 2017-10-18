//function Person(){
//    this.name = "Peter";
//    Person.counter++;
//    alert(Person.counter);
//}
//
//Person.counter = 0;



function f() {
  f.count = ++f.count || 1 // f.count is undefined at first 

  alert("Call No " + f.count)
}




