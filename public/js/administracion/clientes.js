var ruta = document.querySelector("[name=route]").value;
var rute = 'http://localhost/RentSoft/public/';
var urlCliente = rute + '/apiUsuario';
var ini = rute + '/index';

new Vue({
	
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#clientes",

	created:function(){
		this.getClientes();
		this.getBuscar();
	},

	data:{
		saludo:'Hola',
		usuarios:[],
		id_usuario:'',
		nombre:'',
		apellidos:'',
		telefono:'',
		contrasenia:'',
		localidad:'',
		direccion:'',
		editando:false,
		auxCliente:'',
		buscar:''
	},

	methods:{

		getClientes:function(){
			this.$http.get(urlCliente).then(
				function(response)
				{
					this.usuarios=response.data;
				}
			).catch(function(response){
				console.log(response);
			});
		},

		getBuscar:function(){
			this.$http.get(urlCliente).then(function(response){
				this.usuarios=response.data;
			}).catch(function(response){
				console.log(response);
			});
		},

		guardarUser:function() {
			
			var data = new FormData();
			data.append('id_usuario',this.id_usuario);
			data.append('contrasenia',this.contrasenia);
			data.append('nombre',this.nombre);
			data.append('apellidos',this.apellidos);
			data.append('telefono',this.telefono);
			data.append('direccion',this.direccion);
			data.append('localidad',this.localidad);

			if (this.id_usuario == "") {
				var resp = confirm("No Puede dejar los campos vacíos ")
				
				if (resp==true) {
					this.reflash;
				}

			// }else if (this.id_usuario) {
			// 	alert('EL NOMBRE DE USUARIO INGRESADO YA EXISTE, NO PUEDE REPETIRLO')
				
			}else if (true) {
				this.$http.post(urlCliente,data)
				.then(function(json){
					alert('USUARIO AGREGADO');
				})
				.catch(function(json){
					console.log(json);
				})

				this.id_usuario='';
				this.contrasenia='';
				this.nombre='';
				this.apellidos='';
				//this.email='';
				this.telefono='';
				//this.edad='';
				this.direccion='';
				this.localidad='';
				//this.sexo='';
				
			}
			
		},

		eliminarCliente:function(id) {
			var del = confirm("Esta seguro de eliminar al Cliente: " + id)
			if (del==true) {
				this.$http.delete(urlCliente + '/' + id )
				.then(function(json){
					this.getClientes();
				});
			}
		},

		/*editCliente:function(id) {
			this.editando=true;

			this.$http.get(urlCliente + '/' + id)
			.then(function(response){
				this.id_usuario = response.data.id_usuario;
				this.nombre = response.data.nombre;
				this.apellidos = response.data.apellidos;
				this.telefono = response.data.telefono;
				this.contrasenia = response.data.contrasenia;
				this.localidad = response.data.localidad;
				this.direccion = response.data.direccion;
				this.auxCliente = response.data.id_usuario;
			});
		},

		updateCliente:function(id) {
			var cliente={
				id_usuario:this.id_usuario,
				nombre:this.nombre,
				apellidos:this.apellidos,
				telefono:this.telefono,
				contrasenia:this.contrasenia,
				localidad:this.localidad,
				direccion:this.direccion
			};
			
			this.$http.put(urlCliente + '/' + this.id_usuario,cliente)	
			.then(function(response){
				this.getClientes();
				this.editando=false;
				this.auxCliente;

				this.id_usuario='';
				this.nombre='';
				this.apellidos='';
				this.telefono='';
				this.contrasenia='';
				this.localidad='';
				this.direccion='';
			});
		},

		cancelarEdit:function() {
			this.editando=false;
			this.id_usuario='';
			this.nombre='';
			this.apellidos='';
			this.telefono='';
			this.contrasenia='';
			this.localidad='';
			this.direccion='';
		},*/
	},
	
	computed:{
		filtroClientes:function(){
			return this.usuarios.filter((cliente)=>{
				return cliente.id_usuario.match(this.buscar.trim()) ||
					cliente.nombre.toLowerCase()
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},

});