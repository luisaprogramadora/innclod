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
                    <h3 class="m-0">Editar de Documentos</h3>
                  </div><!-- /.col -->
                  <div class="clearfix"></div><br><br>
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Con este formulario se podran editar los documentos</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form id="quickForm">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Documento</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                              placeholder="Ingrese Documento" v-model="documento">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Proceso</label>
                            <select v-model="proceso" class="form-control" id="docente">
                              <option v-for="data in procesos" v-bind:value="data.id">{{ data.pro_nombre }} {{
                                data.pro_prefijo }}</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Tipo</label>
                            <select v-model="tipo" class="form-control" id="tipo">
                              <option v-for="data in tipos" v-bind:value="data.id">{{ data.tip_nombre }} {{
                                data.tip_prefijo }}</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Código</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                              placeholder="Ingrese Código" v-model="codigo">
                          </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="button" @click="actualizar()" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  <div class="col-md-6">

                  </div>
                  <!--/.col (right) -->
                </div>
                <!-- /.row -->
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
      IdDocumento: '',
      documento: '',
      proceso: '',
      tipo: '',
      codigo: '',
      procesos: [],
      tipos: []
    }
  },
  components: {
    NavComponent
  },
  methods: {
    traerProcesos() {
      axios.get('/api/procesos')
        .then((response) => {
          console.log(response, "success");
          this.procesos = response.data;
        })
        .catch(resonse => {
          console.log('error');
        })
    },
    traerTipos() {
      axios.get('/api/tipos')
        .then((response) => {
          console.log(response, "success");
          this.tipos = response.data;
        })
        .catch(resonse => {
          console.log('error');
        })
    },
    actualizar() {
      console.log(this.proceso.id)
      axios.post('/api/editar_documento', {
        documento: this.documento,
        proceso: this.proceso,
        tipo: this.tipo,
        codigo: this.codigo,
        IdDocumento: this.IdDocumento
      }
      ).then(response => {
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Registro actualizado',
          showConfirmButton: false,
          timer: 1500
        })
      })
        .catch(err => { console.log(err) });
    },
    TraerDocumento(id) {
      axios.get('/api/getDocumento', {
        params: {
          id: id
        }
      })
        .then((response) => {
          console.log(response, "response")
          this.documento = response.data.documento;
          this.proceso = response.data.proceso;
          this.tipo = 1;
          this.codigo = response.data.codigo;
          this.IdDocumento = response.data.id;
        })
        .catch(resonse => {
          console.log('error');
        })
    }
  },
  mounted() {
    this.traerProcesos();
    this.traerTipos();
    this.TraerDocumento(this.$route.query.id);
  }
}
</script>
