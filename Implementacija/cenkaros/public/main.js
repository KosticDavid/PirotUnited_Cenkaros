var namirnice = [
	"Paradajz","Krompir","Jaja","Hleb","Mleko","Sir"
];

function search()
{
	let results =document.getElementById("results");
	results.innerHTML="";
	let search = document.getElementById("search-articles");
	let searchtext = search.value.toLowerCase().trim();
	if(searchtext==="")return;
	namirnice.forEach(element => {
		if(element.toLocaleLowerCase().includes(searchtext))
		{
			let div = document.createElement("DIV");
			div.className="result";
			div.innerHTML=element;
			div.onclick=function(){addArticle(this.innerHTML)}
			results.appendChild(div);
		}
	});
}

function addArticle(name)
{
	//AMMOUNT
	let a=window.prompt("Kolicina","1")

	let t = document.getElementById("articles");
	let r = document.createElement("TR");
	let f1 =  document.createElement("TD");
	let f2 =  document.createElement("TD");
	let f3 =  document.createElement("TD");
	let f4 =  document.createElement("TD");
	f1.innerText=t.rows.length+".";
	f2.innerText=name;
	f3.innerHTML='<input type="number" name="" id="" value="'+a+'">';
	f4.innerHTML='<td><a href="#">Ukloni</a></td>';
	r.appendChild(f1);
	r.appendChild(f2);
	r.appendChild(f3);
	r.appendChild(f4);
	t.appendChild(r);

}