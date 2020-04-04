var ruta = document.querySelector("[name=route]").value;
var rute = 'http://localhost/RentSoft/public/';
var urlContacto = rute + '/apiContacto';

new Vue({

	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#contactanos",

	created:function(){
		this.getDatos();
	},

	data:{
		SALUDO:'HOLAMUNDO',
		datos:[],
		rfc:'',
    	nombre:'',
    	encargado:'',
    	correo:'',
    	telefono:'',
    	direccion:'',
    	localidad:''
	},

	methods:{

		getDatos:function(){
			this.$http.get(urlContacto)
			.then(function(response){
				this.datos=response.data;
			}).catch(function(json){
				console.log(json);
			});
		},
	}
});