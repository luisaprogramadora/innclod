<template>
  <!-- Main Sidebar Container -->
  <NavComponent></NavComponent>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="container">           
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12" style="text-align: center;">
                    <div class="card-body">    
                      <router-link to="/mis_documentos" class="btn btn-app bg-success">                                                                          
                          <span class="badge bg-purple"></span>
                          <i class="fas fa-users"></i> Listar Documentos               
                      </router-link>            
                    </div>
                    <h3 class="m-0">Creación de Procesos</h3>
                  </div><!-- /.col -->
                  <div class="clearfix"></div><br><br>
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Con este formulario se podran crear los Procesos</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form id="quickForm">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Pro Prefijo</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                              placeholder="Ingrese Prefijo" v-model="pro_prefijo">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Pro Nombre</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                              placeholder="Ingrese Nombre" v-model="pro_nombre">
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="button" @click="guardar()" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
                    </div>                    
                  </div>               
                </div>
              </div><!-- /.container-fluid -->
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios'
import NavComponent from '../components/NavComponent.vue';
export default {
  data() {
    return {
      pro_prefijo: '',
      pro_nombre: ''      
    }
  },
  components: {
    NavComponent
  },
  methods: {
    guardar() {      
      axios.post('/procesos', {
        pro_prefijo: this.pro_prefijo,
        pro_nombre: this.pro_nombre
      }
      ).then(response => { 
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Registro almacenado',
          showConfirmButton: false,
          timer: 1500
        })
        window.location.href = '/';
       })
        .catch(err => { console.log(err) });
    }
  },
  mounted() {
    console.log('Component mounted.')
  }
}
</script>
