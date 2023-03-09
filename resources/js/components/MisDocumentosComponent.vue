<template>
  <!-- Main Sidebar Container -->
  <NavComponent></NavComponent>
  <div class="clearfix"></div><br>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card-body">
              <router-link to="/crear_documento" class="btn btn-app bg-success">
                <span class="badge bg-purple"></span>
                <i class="fas fa-inbox"></i> Documentos
              </router-link>
              <router-link to="/tipo_documento" class="btn btn-app bg-danger">
                <span class="badge bg-teal"></span>
                <i class="fas fa-inbox"></i> Tipo Documentos
              </router-link>
              <router-link to="/proceso" class="btn btn-app bg-warning">
                <span class="badge bg-info"></span>
                <i class="fas fa-inbox"></i> Procesos
              </router-link>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listado Informacion Documentos</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>DOCUMENTO</th>
                      <th>PROCESO</th>
                      <th>TIPO</th>
                      <th>CODIGO</th>
                      <th>ACCION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(data, i) in documentos" :key="i">
                      <td>{{ data.id }}</td>
                      <td>{{ data.documento }}</td>
                      <td>{{ data.proceso }}</td>
                      <td>{{ data.tipo }}</td>
                      <td>{{ data.codigo }}</td>
                      <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <router-link class="btn btn-block bg-gradient-success btn-sm" :to="'/editar_documento?id=' + data.id"> <i class="fas fa-edit"></i> Editar</router-link>                        
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <button type="button" class="btn btn-block bg-gradient-danger btn-sm"
                            @click="eliminar(data.id)"> <i class="fas fa-trash"></i> Eliminar</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
      documentos: []
    }
  },
  components: {
    NavComponent
  },
  methods: {
    eliminar(id) {
      Swal.fire({
        title: 'Deseas eliminar este registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.post('/api/eliminar_documento', {
          IdDocumento: id,        
      }
      ).then(response => { 
        Swal.fire(
            'Eliminado!',
            'Tu registro fue eliminado.',
            'success'
          )
          this.traerDocumentos();
       })
        .catch(err => { console.log(err) });
          
        }
      })
    },
    traerDocumentos() {
      axios.get('/api/traer_documentos')
        .then((response) => {
          console.log(response, "success");
          this.documentos = response.data;
        })
        .catch(resonse => {
          console.log('error');
        })
    },
  },
  mounted() {
    this.traerDocumentos();        
  }
}
</script>
