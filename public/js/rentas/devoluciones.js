var url = document.querySelector("[name=route]").value;
var ruta = 'http://localhost/RentSoft/public/';
var urlArticulo = ruta + '/apiArticulo';
var urlDevolucion = ruta + '/apiDevolucion';

function init()
{

	new Vue({

		http: {
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

		el: '#devoluciones',

		created:function(){
			this.foliarDevolucion();
		},

		data:{
			saludo:'hola mundo',
			articulos:[],
			devoluciones:[],
			codigo:'',
			folio_dev:'',

			fecha_devolucion:moment().format('YYYY/MM/DD'),
		},

		methods:{
			getArticulo:function(){
				this.$http.get(urlArticulo + '/' + this.codigo)
				.then(function(json){
					var devolucion={
						'id_articulo':json.data.id_articulo,
						'nombre':json.data.nombre
					}

					if (devolucion.id_articulo) {
						this.devoluciones.push(devolucion);
						this.codigo='';
						this.$refs.buscar.focus()
					}
				})
			},

			eliminarArticulo:function(id){
				this.devoluciones.splice(id,1);
			},

			foliarDevolucion:function(){
				this.folio_dev='DVNS-' + moment().format('YYMMDDhmmss');
			},

			devolver:function(){

				var detalles1=[];

				for (var i = 0; i < this.devoluciones.length; i++) {
					detalles1.push({
						id_articulo:this.devoluciones[i].id_articulo,
					})	
				}

				var unaDevolucion = {
					folio_dev:this.folio_dev,
					fecha_devolucion:this.fecha_devolucion,
					id_empleado:'vendor',
					detalles:detalles1
				}

				console.log(unaDevolucion);

				this.$http.post(urlDevolucion,unaDevolucion)
				.then(function(json){
					console.log(json.data);
				}).catch(function(json){
					console.log(json.data);
				});

				alert('¡¡¡La devolución se realizó con éxito!!!\n Los artículos devueltos ya pueden rentarse de nuevo')
				this.foliarDevolucion();
				this.devoluciones=[];
			}
		},
	});
}
window.onload=init;