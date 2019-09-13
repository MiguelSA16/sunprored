<template>
    <b-container fluid class=" bg-white py-4">
        <!-- User Interface controls -->
        <b-row>
            <b-col lg="4" class="my-1">
                <b-form-group label="Buscar: " label-cols-sm="2" label-align-sm="right" label-size="sm" label-for="filterInput" class="mb-0" >
                    <b-input-group size="sm">
                        <b-form-input v-model="filter" type="search" id="filterInput" placeholder="Escribe para buscar"></b-form-input>
                        <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">
                                Limpiar
                            </b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="3" class="my-1 offset-lg-3">
                <b-form-group label="Ordenar por: " label-cols-sm="3" label-align-sm="right" label-size="sm" label-for="sortBySelect" class="mb-0" >
                    <b-input-group size="sm">
                        <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-50">
                            <option slot="first" value="">-- ninguno --</option>
                        </b-form-select>
                        <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="">
                            <option :value="false">Asc</option>
                            <option :value="true">Desc</option>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="2" class="my-1 ">
                <b-form-group label="Número de filas" label-cols-lg="6" label-align-sm="right" label-size="sm" label-for="perPageSelect" class="mb-0" >
                    <b-form-select v-model="perPage" id="perPageSelect" size="sm" :options="pageOptions" class="w-100"></b-form-select>
                </b-form-group>
            </b-col>

            <b-col lg="5" class="my-2">
                <b-form-group label="Buscar por:" label-cols-lg="2" label-align-sm="right" label-size="sm" class="mb-0">
                    <b-form-checkbox-group v-model="filterOn" class="mt-1">
                        <b-form-checkbox value="id">ID</b-form-checkbox>
                        <b-form-checkbox value="nombre">Nombre</b-form-checkbox>
                        <b-form-checkbox value="codigo">Codigo</b-form-checkbox>
                        <b-form-checkbox value="familia_id">Familia ID</b-form-checkbox>
                        <b-form-checkbox value="grupo">Grupo</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col lg="5" sm="6" md="6" class="my-2 offset-lg-2">
                <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" align="fill" size="sm" ></b-pagination>
            </b-col>

            
            <b-col lg="2" sm="6" md="6" class="mt-0 text-left">
                <b-button variant="dark" class="my-1 py-0">
                    AGRUPAR ARTICULOS DE ALTA
                </b-button >
            </b-col>
            <b-col lg="2" sm="6" md="6" class="mt-0 text-left">
                <b-button variant="primary" class="my-1 py-0">
                    ARTICULOS DE ALTA <b-badge variant="dark"> {{this.totalRows}}</b-badge> 
                </b-button >    
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table small striped hover head-variant="dark" sticky-header="600px" :busy="isBusy" :items="items" :fields="fields" :current-page="currentPage" :per-page="perPage" :filter="filter"
        :filterIncludedFields="filterOn" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc" @filtered="onFiltered" >
            
            
            <template v-slot:table-busy>
                <div class="text-center text-danger my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Loading...</strong>
                </div>
            </template>

            <template slot="[name]" slot-scope="row">
                {{ row.value.first }} {{ row.value.last }}
            </template>
            
            <template slot="[actions]" slot-scope="row">
                <b-button variant="warning" size="sm" @click="showModalEditar(row.item)" class="mr-1 py-0">
                    Editar
                </b-button>

                <b-button variant="success" size="sm" @click="row.toggleDetails" class="py-0">
                    {{ row.detailsShowing ? 'Ocultar' : 'Ver' }} 
                </b-button>

                <b-button variant="dark" size="sm" class="py-0" @click="showModalAgrupar(row.item)">
                    Agrupar
                </b-button>
            </template>

            <template slot="row-details" slot-scope="row">
                <b-card>
                    <ul>
                        <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
                    </ul>
                </b-card>
            </template>
        </b-table>

        

        <!-- Editar modal -->
        <b-modal ref="modal-editar" title="Editar Ariculo" hide-footer>
            <form action="POST" @submit.prevent="updateArticulo(fillArticulo.id)">             
                <b-input-group size="sm" class="mb-2">
                    <b-input-group-text slot="prepend" class="width-prepend">Nombre </b-input-group-text>
                    <b-input type="text" id="codigo" v-model="fillArticulo.nombre" size="sm"></b-input>
                </b-input-group>

                <b-input-group size="sm" class="mb-2">
                    <b-input-group-text slot="prepend" class="width-prepend">Familia </b-input-group-text>
                    <b-input type="text" id="familia_id" v-model="fillArticulo.familia_id" size="sm"></b-input>
                </b-input-group> 

                <b-input-group size="sm" class="mb-2">
                    <b-input-group-text slot="prepend" class="width-prepend">Grupo </b-input-group-text>
                    <b-input type="text" id="grupo" v-model="fillArticulo.grupo" size="sm"></b-input>
                </b-input-group>   

                <b-input-group size="sm" class="mb-2">
                    <b-input-group-text slot="prepend" class="width-prepend">Color </b-input-group-text>
                    <b-input type="text" id="color" v-model="fillArticulo.color" size="sm"></b-input>
                </b-input-group> 

                <b-input-group size="sm" class="mb-2">
                    <b-input-group-text slot="prepend" class="width-prepend">Longitud </b-input-group-text>
                    <b-input type="text" id="longitud" v-model="fillArticulo.longitud" size="sm"></b-input>
                </b-input-group>  

                <b-input-group size="sm" class="mb-2">
                    <b-input-group-text slot="prepend" class="width-prepend">Ancho </b-input-group-text>
                    <b-input type="text" id="ancho" v-model="fillArticulo.ancho" size="sm"></b-input>
                </b-input-group>   
                <hr class="mt-1 mb-2">                
                <div class="w-10 text-right">
                    <b-button type="submit" variant="primary">
                        Actualizar
                    </b-button>
                    <b-button type="reset" variant="danger">
                        Limpiar
                    </b-button>                    
                </div>                   
            </form>           
        </b-modal>

        <!-- Agrupar modal -->
        <b-modal ref="modal-agrupar" title="Agrupar Ariculos" hide-footer>
            <form method="POST" @submit.prevent="agruparArticulos">
                <b-form-group label="Columna :" label-for="columna"  label-cols="3" >
                    <b-form-select v-model="selected" size="sm"> 
                        <option :value="null" disabled>-- Por favor seleccione una opción --</option>
                        <option value="codigo">Codigo</option>
                        <option value="grupo" >Grupo</option>
                    </b-form-select>
                </b-form-group>
                
                <b-form-group label="Buscar :" label-for="buscar" invalid-feedback="Name is required" label-cols="3">
                    <b-form-input id="buscar" v-model="buscar" size="sm" @keyup="modificarTextGrupo" required ></b-form-input>
                </b-form-group>

                <b-form-group label="Agrupar :" label-for="grupo" label-cols="3">
                    <b-form-input id="grupo" v-model="grupo" size="sm" required></b-form-input>
                </b-form-group>

                <b-form-group label="Familia ID :" label-for="familia" label-cols="3">
                    <b-form-input id="familia" v-model="familia" size="sm" required ></b-form-input>
                </b-form-group>

                <b-form-group label="Color :" label-for="color" label-cols="3">
                    <b-form-input id="color" v-model="color" @keyup="mayusculas" size="sm" ></b-form-input>
                </b-form-group>
                <hr class="mt-1 mb-2">                
                <div class="w-10 text-right">
                    <b-button type="submit" variant="primary">
                        Agrupar
                    </b-button>
                    <b-button type="reset" variant="danger">
                        Limpiar
                    </b-button>                    
                </div>          
            </form>
        </b-modal>
    </b-container>
</template>

<script>
    export default {
        data() {
            return {

                codigo:'',
                nombre:'',                
                familia:'',
                color:'',
                longitud:'',
                selected:null,
                items: [],
                columna:'',
                buscar:'',
                grupo: '',    
                isBusy: true,
                fillArticulo: { 'id' : '', 'nombre':'', 'familia_id' : '', 'grupo' : '', 'color' : '', 'longitud' : '', 'ancho' : '' },

                fields: [
                { key: 'id', label: '#ID', sortable: true },
                { key: 'codigo', label: 'Codigo', sortable: true, sortDirection: 'desc' },
                { key: 'nombre', label: 'Nombre', sortable: true },
                { key: 'familia_id', label: 'Familia ID', sortable: true },
                { key: 'grupo', label: 'Grupo', sortable: true }, 
                { key: 'color', label: 'Color', sortable: true }, 
                { key: 'longitud', label: 'Longitud', sortable: true }, 
                { key: 'ancho', label: 'Ancho', sortable: true }, 
                { key: 'actions', label: 'Acciones' }
                ],

                totalRows: 1,
                currentPage: 1,
                perPage: 25,
                pageOptions: [25, 50, 100,200,500],
                sortBy: '',
                sortDesc: false,
                filter: null,
                filterOn: [],
                
            }
        },
        computed: {
            sortOptions() {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                    return { text: f.label, value: f.key }
                    
                })
            }
        },      

        created(){

            this.getArticulos()
        },

        methods: {

            showModalEditar(item) {
                               
                //this.infoModal.title = 'Editar Articulo ' + item.codigo

                this.fillArticulo.id = item.id
                this.fillArticulo.nombre = item.nombre
                this.fillArticulo.familia_id = item.familia_id
                this.fillArticulo.grupo = item.grupo
                this.fillArticulo.color = item.color
                this.fillArticulo.longitud = item.longitud + ' m'
                this.fillArticulo.ancho = item.ancho
                this.$refs['modal-editar'].show() 
            },

            updateArticulo(id){
                var url ='http://sunpro2.test/api/articulos/'+id;
                axios.put(url, this.fillArticulo).
                then(response =>{
                    this.isBusy=true
                    this.getArticulos(),
                    this.$refs['modal-editar'].hide(), 
                    this.$bvToast.toast('Los articulos se actualizaron con exito', {
                        title: 'Mensaje de Sunpro',
                        variant: 'success',
                        toaster:'b-toaster-top-right'
                    }),
                    this.fillArticulo = { 'id' : '', 'nombre':'', 'familia_id' : '', 'grupo' : '', 'color' : '', 'longitud' : '', 'ancho' : '' }
                    
                }).catch(error => {
				    this.errors = 'Corrija para poder editar con éxito'
			    });
            },

            resetInfoModal() {
                this.infoModal.title = ''
                this.infoModal.content = ''
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },

            getArticulos(){
                var url ='http://sunpro2.test/api/articulos'; 
                axios.get(url).then(res=>{
                    this.items= res.data.articulos
                    this.totalRows = this.items.length
                    this.isBusy= false
                });
            },

            showModalAgrupar(item){  

                var grupo = item.codigo
                this.buscar=item.codigo
                grupo = grupo.replace(/\./g,"")
                grupo = grupo.replace(/\,/g,"")
                grupo = grupo.replace(/-/g,"")
                grupo = grupo.replace(/\//g, ""); 
                this.grupo=grupo+'.0.L.F',
                this.familia = item.familia_id
                this.$refs['modal-agrupar'].show()
            },            

            agruparArticulos(){
                
                var url ='http://sunpro2.test/api/agrupar'; 
                axios.post(url,{
                    columna : this.selected,
                    buscar: this.buscar,
                    grupo : this.grupo,
                    familia_id: this.familia,
                    color: this.color
                }).then(response =>{
                    this.isBusy=true,
                    this.getArticulos(),     
                    this.$refs['modal-agrupar'].hide(),               
                    this.$bvToast.toast('Los articulos se agruparon con exito', {
                        title: 'Mensaje de Sunpro',
                        variant: 'success',
                        toaster:'b-toaster-top-right'
                    })
                }).catch(error => {
				    this.errors = 'Corrija para poder editar con éxito'
			    });
            },

            mayusculas(){
                this.color= this.color.toUpperCase()
            },

            modificarTextGrupo(){
                this.grupo = this.buscar+'.0.L.F'
            }
        }
}
</script>

