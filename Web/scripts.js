const btn = document.getElementById('btn');

btn.onclick = ()=> {
  const form = document.getElementById('form');
if(form){
  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
}else{
	console.log('element not found');
}
  
};

function an(){
	const hug = document.getElementById('AddAnnounce');
	
	if(hug.style.display === 'block'){
	hug.style.display = 'none';
	}else{
	  hug.style.display = 'block';
	}
};

function ss(){
	const si = document.getElementById('sign');
	
	if(si.style.display === 'block'){
	si.style.display = 'none';
	}else{
	  si.style.display = 'block';
	}
};

function closing(){
  const req = document.getElementById('request');
  const res = document.getElementById('Residents');
  const Add = document.getElementById('Add');
  
  if(req.style.display === 'block'){
  req.style.display = 'none';
  }else{
  req.style.display = 'block';
  res.style.display = 'none';
  Add.style.display = 'none';
  }
};

function list(){
  const kill = document.getElementById('showlist');
  const res = document.getElementById('Residents');
  const Add = document.getElementById('Add');
  
	if(kill.style.display === 'block'){
		kill.style.display = 'none';
	}else{
		kill.style.display = 'block';
		res.style.display = 'none';
		Add.style.display = 'none';
	}
  
};

function add(){
  const res = document.getElementById('Residents');
  const Add = document.getElementById('Add');
  
    res.style.display = 'none';
	Add.style.display = 'block';

};

function show() {
  const res = document.getElementById('Residents');
  const Add = document.getElementById('Add');
  const req = document.getElementById('request');


  if (res.style.display === 'none') {
    res.style.display = 'block';
	Add.style.display = 'none';
	req.style.display = 'none';
  } else {
    res.style.display = 'none';
	Add.style.display = 'block';
  }
};


function a1() {
  const res = document.getElementById('Residents');
  const Add = document.getElementById('Add');
  const req = document.getElementById('request');
  const kill = document.getElementById('showlist');
  
   if (res.style.display === 'block'||Add.style.display === 'block') {
	Add.style.display = 'none';
	res.style.display = 'none';
	
  } else{
    res.style.display = 'block';
	req.style.display = 'none';
	kill.style.display = 'none';
  }
  
  
};
document.getElementById("DisplayAccounts").addEventListener("click", a1);