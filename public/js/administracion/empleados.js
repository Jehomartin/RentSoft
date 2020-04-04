var ruta = document.querySelector("[name=route]").value;
var rute = 'http://localhost/RentSoft/public/';
var urlEmpleados = rute + '/apiEmpleado';
var urlPuesto = rute + '/apiPuesto';

new Vue({
	
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#empleados", //este es la zona de actuar de vue (id)
	created:function(){
		this.getEmpleados();
		this.getBuscar();
		this.getPuesto();
	},
	data:{
		//saludo:'Hola mundo',
		empleados:[],
		puestos:[],
		id_puesto:'',
		id_empleado:'',
		nombre:'',
		apellidos:'',
		telefono:'',
		contrasenia:'',
		edad:'',
		sexo:'',
		editando:false,
		auxEmpleado:'',
		buscar:''
	},

	methods:
		{
			getEmpleados:function()
		    {
				this.$http.get(urlEmpleados).then(
					function(response)
				{
					this.empleados=response.data;
				}
				).catch(function(response){
					console.log(response);
				});
			},

			getBuscar:function(){
				this.$http.get(urlEmpleados)
				.then(function(json){
					this.empleados=json.data;
				}).catch(function(json){
					console.log(json);
				});
			},

			getPuesto:function(){
				this.$http.get(urlPuesto)
				.then(function(response){
					this.puestos=response.data;
				}).catch(function(response){
					console.log(response);
				});
			},

			agregarEmpleado:function() {
				//Construyendo un objeto de tipo Json para enviar a la Api
				var empleado={id_empleado:this.id_empleado,nombre:this.nombre,apellidos:this.apellidos, 
					telefono:this.telefono, contrasenia:this.contrasenia,edad:this.edad, sexo:this.sexo,
					id_puesto:this.id_puesto};
				//limpiar campos
				this.id_empleado='';
				this.nombre='';
				this.apellidos='';
				this.telefono='';
				this.contrasenia='';
				this.edad='';
				this.sexo='';
				this.id_puesto='';
				//para poder entrar al método store necesitamos de un post y se evia el json
				this.$http.post(urlEmpleados,empleado).then
                    (function(response) {
                    	this.getEmpleados();
                    	
                    });
			},
		
		eliminarEmpleado:function(id){
			var resp = confirm("Esta seguro de eliminar al empleado: " + id)
			if(resp==true)
			{
				this.$http.delete(urlEmpleados + '/' + id)
				.then(function(json){
					this.getEmpleados();
				});
			}
		},

		editEmpleado:function(id){
			this.editando=true;
			//peticion al servidor
			this.$http.get(urlEmpleados + '/' + id).then
			(function(response){
				this.id_empleado = response.data.id_empleado;
				this.nombre = response.data.nombre;
				this.apellidos = response.data.apellidos;
				this.telefono = response.data.telefono;
				this.contrasenia = response.data.contrasenia;
				this.edad = response.data.edad;
				this.sexo = response.data.sexo;
				this.id_puesto = response.data.id_puesto;
				this.auxEmpleado = response.data.id_empleado;
			});
		},

		updateEmpleado:function(id){
			var empleado={id_empleado:this.id_empleado,nombre:this.nombre,apellidos:this.apellidos, 
				telefono:this.telefono, contrasenia:this.contrasenia,edad:this.edad,sexo:this.sexo,
				id_puesto:this.id_puesto};
			this.$http.put(urlEmpleados + '/' + this.id_empleado,empleado)
			.then(function(response){
				this.getEmpleados();
				this.editando=false;
				this.auxEmpleado;
				
				this.id_empleado='';
				this.nombre='';
				this.apellidos='';
				this.telefono='';
				this.contrasenia='';
				this.edad='';
				this.sexo='';
				this.id_puesto='';
			});
		},
		
		cancelarEdit:function(){
			this.editando=false;
			this.id_empleado='';
			this.nombre='';
			this.apellidos='';
			this.telefono='';
			this.contrasenia='';
			this.edad='';
			this.sexo='';
			this.id_puesto='';
		},

	},

	computed:{
		filtroEmpleados:function(){
			return this.empleados.filter((empleado)=>{
				return empleado.id_empleado.match(this.buscar.trim()) ||
					empleado.nombre.toLowerCase()
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},

});