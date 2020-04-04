var ruta = document.querySelector("[name=route]").value;
var rute = 'http://localhost/RentSoft/public/';
var rut = 'http://localhost/RentSoft/public/';
var urlArticulo = rute + '/apiArticulo';
var urlRenta =rut + '/apiRenta';

function init()
{
	new Vue({
		http: {
			headers: {
				'X-CSRF-TOKEN' : document.querySelector('#token').getAttribute('value')
			}
		},

		el: '#rentas',

		created:function(){
			this.foliarRenta();
		},

		data:{
			saludo:'hola mundo',
			articulo:[],
			rentas:[],
			codigo:'',
			pago:0,
			tot:0,
			folio:'',

			//cantidades:[1,1,1,1,1,1,1],
			fecha_renta:moment().format('YYYY/MM/DD'),
		},

		methods:{
			//inicio de getarticulo
			getArticulo:function(){
				this.$http.get(urlArticulo + '/' + this.codigo)
				.then(function(json){
					var renta={
						'id_articulo':json.data.id_articulo,
						'nombre':json.data.nombre,
						'precio':json.data.precio,
						//'cantidad':1,
						'total':json.data.precio
					}

					if (renta.id_articulo) {
						this.rentas.push(renta);
						this.codigo='';
						this.$refs.buscar.focus()
					}
				})
			}, //fin de getarticulo

			eliminarArticulo:function(id){
				this.rentas.splice(id,1);
			},
			/*addArticulo:function(id){
				this.rentas[id].cantidad++;
				this.rentas[id].total = this.rentas[id].cantidad * this.rentas[id].precio;
			},
			menosArticulo:function(id){
				if (this.rentas[id].cantidad>=2) {
					this.rentas[id].cantidad--;
					this.rentas[id].total = this.rentas[id].cantidad * this.rentas[id].precio;					
				}
			},*/

			foliarRenta:function(){
				this.folio='RTA-' + moment().format('YYMMDDhmmss');
			},

			//inicio de la funcion de rentar
			rentar:function(){

				var detalles2=[];

				for (var i = 0; i < this.rentas.length; i++) {
					detalles2.push({
						id_articulo:this.rentas[i].id_articulo,
						precio:this.rentas[i].precio,
						//cantidad:this.cantidades[i],
						total:this.rentas[i].precio
					})	
				}

				var unaRenta = {
					folio:this.folio,
					id_empleado:'admin',
					fecha_renta:this.fecha_renta,
					fecha_devolucion:'2020/02/13',
					total:this.tot,
					detalles:detalles2
				}

				console.log(unaRenta);

				this.$http.post(urlRenta,unaRenta)
				.then(function(json){
					console.log(json.data);
				}).catch(function(x){
					console.log(x.data);
				});

				alert('La renta se a guardado con éxito!!!\n Los artículos rentados ya no estaran disponibles hasta su devolución');
				this.rentas=[];
				this.foliarRenta();
				// this.cantidades=[1,1,1,1,1,1,1];
			}
			//fin de funcion rentar
		}, //fin de los metodos

		computed:{
			total:function(){
				var suma=0;
				for (var i = 0; i < this.rentas.length; i++) {
					suma=suma + this.rentas[i].precio;
				}
				this.tot=suma;
				return suma;
			},

			cambio:function(){
				return this.pago - this.tot;
			},

			totalArticulo(){
				return (id)=>{
					var total=0;
					total= this.rentas[id].precio;
						return total.toFixed(1);
				}
			}
		}

	});
}
window.onload=init;