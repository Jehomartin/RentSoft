var ruta = document.querySelector("[name=route]").value;
var rute = 'http://localhost/RentSoft/public/';
var urlArticulos = rute + '/apiArticulo';

new Vue({
	
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#articulos", //este es la zona de actuar de vue (id)

	created:function(){
		this.getArticulos();
		this.getBuscar();
	},
	data:{
		//saludo:'Hola mundo',
		articulos:[],
		id_articulo:'',
		nombre:'',
		tipo:'',
		disponible:'',
		precio:'',
		editando:false,
		auxArticulo:'',
		buscar:''
	},

	methods:
		{
			getArticulos:function()
		    {
				this.$http.get(urlArticulos).then(
					function(response)
				{
					this.articulos=response.data;
				}
				).catch(function(response){
					console.log(response);
				});
			},

			getBuscar:function(){
				this.$http.get(urlArticulos)
				.then(function(json){
					this.articulos=json.data;
				}).catch(function(json){
					console.log(json);
				})
			},

			/*showModal:function(){
			$('#add_empleado').modal('show');
			},*/

			agregarArticulo:function() {
				//Construyendo un objeto de tipo Json para enviar a la Api
				var articulo={id_articulo:this.id_articulo,nombre:this.nombre,tipo:this.tipo, 
					disponible:this.disponible, precio:this.precio};
				//limpiar campos
				this.id_articulo='';
				this.nombre='';
				this.tipo='';
				this.disponible='';
				this.precio='';
				//para poder entrar al método store necesitamos de un post y se evia el json
				this.$http.post(urlArticulos,articulo)
				.then(function(response) {
                    	this.getArticulos();
                    	//$('#add_empleado').modal('hide');
                    });
			},
		
			eliminarArticulo:function(id){
				var resp = confirm("Esta seguro de eliminar el articulo: " + id)
				if(resp==true)
				{
					this.$http.delete(urlArticulos + '/' + id)
					.then(function(json){
						this.getArticulos();
					});
				}
			},

			editArticulo:function(id){
				this.editando=true;
				//alert(id);
				//$('#add_empleado').modal('show');
				//peticion al servidor
				this.$http.get(urlArticulos + '/' + id)
				.then(function(response){
					this.id_articulo = response.data.id_articulo;
					this.nombre = response.data.nombre;
					this.tipo = response.data.tipo;
					this.disponible = response.data.disponible;
					this.precio = response.data.precio;
					this.auxArticulo = response.data.id_articulo;
				});
			},

			updateArticulo:function(id){
				var articulo={id_articulo:this.id_articulo,nombre:this.nombre,tipo:this.tipo, 
					disponible:this.disponible, precio:this.precio};

				this.$http.put(urlArticulos + '/' + this.id_articulo,articulo)
				.then(function(response){
					this.getArticulos();
					this.editando=false;
					this.auxArticulo;
					
					this.id_articulo='';
					this.nombre='';
					this.tipo='';
					this.disponible='';
					this.precio='';
				});
			},

			cancelarEdit:function(){
				this.editando=false;
				this.id_articulo='';
				this.nombre='';
				this.tipo='';
				this.disponible='';
				this.precio='';
			},

	},

	computed:{
		filtroArticulos:function(){
			return this.articulos.filter((articulo)=>{
				return articulo.id_articulo.match(this.buscar.trim()) ||
					articulo.nombre.toLowerCase()
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},

});