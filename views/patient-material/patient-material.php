    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 px-md-8">
          <?php echo new Template('parts/upcm_logo') ?>
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="grey--text text--darken-1">Materiales para el paciente{{ isSelected ? ': ' + patient_fullname : '' }}</h2>
            </v-col>
            
          </v-row>
          <v-row class="mt-6" v-if="!isSelected">
            <v-col cols="12">
              <v-form>
                <v-row>
                  <v-col cols="12">
                    <v-text-field v-model="search" label="Buscar el paciente" hint="Ingrese el nombre del paciente" outlined>
                      <template v-slot:append-outer>
                        <v-btn class="primary white--text py-7 ml-n3 submit-button" v-on:click="searched = true">
                          <v-icon large>mdi-magnify</v-icon>
                        </v-btn>
                      </template>
                    </v-text-field>
                  </v-col>
                  <v-col cols="12" v-if="searched">
                    <v-select class="mt-3" v-model="patient_id" label="Seleccione el paciente" :items="searchPatient" item-text="full_name" item-value="id" v-on:change="isSelected = true" outlined></v-select>
                  </v-col>
                </v-row>
              </v-form>
            </v-col>
          </v-row>
          <v-row v-if="isSelected">
            <v-col cols="12">
              <v-data-table :headers="headers" :items="patients_material" sort-by="date" class="elevation-1" >
                <template v-slot:top>
                  <v-toolbar flat>     
                    <v-spacer></v-spacer>           
                    <v-btn color="secondary" dark rounded class="mb-2 mr-5" v-on:click="resetSearch">
                      <v-icon>mdi-magnify</v-icon>
                        Buscar otro paciente
                    </v-btn>
                    <v-dialog v-model="dialog" max-width="50%" >
                      <template v-slot:activator="{ on, attrs }">
                        <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on">
                          <v-icon>mdi-plus</v-icon>
                          Añadir material
                        </v-btn>
                      </template>
                      <v-card>
                        <v-toolbar class="mp-select-toolbar" elevation="0">
                          <h4 class="text-h4 text-center grey--text text--darken-1 font-weight-medium">¿Cómo le gustaría añadir el material para el paciente?</h4>
                          <v-spacer></v-spacer>
                          <v-toolbar-items>
                            <v-btn icon dark @click="dialog = false">
                              <v-icon color="grey">mdi-close</v-icon>
                            </v-btn>
                          </v-toolbar-items>
                        </v-toolbar>
                        
                        <v-card-text>
                          <v-container fluid>

                            <v-row >
                              <!---INSERT FORM HERE-->
                              <v-col class="d-flex justify-center" cols="12">
                                <v-radio-group v-model="material_type" row>
                                  <v-radio label="Material personalizado" value="custom material"></v-radio>
                                  <v-radio label="Subir archivo" value="file upload"></v-radio>
                                </v-radio-group>
                              </v-col>
                            </v-row>

                          </v-container>
                        </v-card-text>
                        <v-card-actions class="px-6">
                          <v-spacer></v-spacer>
                          <v-btn color="secondary white--text text-capitalize" block @click="materialFormDialog = true; dialog = false">
                            Continuar
                          </v-btn>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                    <v-dialog v-model="materialFormDialog" max-width="90%" >
                      <v-card>
                        <v-toolbar class="mp-select-toolbar" elevation="0">
                          <v-toolbar-title>Añadir material para el paciente: {{ patient_fullname }}</v-toolbar-title>
                          <v-spacer></v-spacer>
                          <v-toolbar-items>
                            <v-btn icon dark @click="materialFormDialog = false">
                              <v-icon color="grey">mdi-close</v-icon>
                            </v-btn>
                          </v-toolbar-items>
                        </v-toolbar>
                        
                        <v-card-text>
                          <v-container fluid>

                            <v-row >
                              <!---INSERT FORM HERE-->
                              <v-col cols="12">
                                <label class="black--text">Título</label>
                                <v-text-field class="mt-3" v-model="title" outlined></v-text-field>
                              </v-col>
                              <v-col cols="12" v-if="material_type == 'file upload'">
                                <label class="black--text">Archivo del material a enviar</label>
                                <v-file-input prepend-icon="" show-size outlined>
                                  <template v-slot:append-outer>
                                    <v-btn class="primary white--text py-7 ml-n3 submit-button">
                                      Elegir
                                    </v-btn>
                                  </template>
                                </v-file-input>                              
                              </v-col>
                              <v-col cols="12" v-if="material_type == 'custom material'">
                                <label class="black--text">Contenido del material</label>
                                <vue-editor class="mt-3" v-model="material_content" placeholder="Contenido del material que será enviado al paciente"/>
                              </v-col>
                              <v-col cols="12">
                                <label class="black--text">Contenido del mensaje (Opcional)</label>
                                <vue-editor class="mt-3" v-model="message_content" placeholder="Contenido del mensaje a ser enviado en el correo"/>
                              </v-col>
                            </v-row>

                          </v-container>
                        </v-card-text>
                        <v-card-actions class="px-6">
                          <v-spacer></v-spacer>
                          <v-btn color="secondary white--text text-capitalize" block @click="save">
                            Enviar
                          </v-btn>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogDelete" max-width="1200px">
                      <v-card>
                        <v-card-title class="headline">Estás seguro de que quieres eliminar este material?</v-card-title>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                          <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar</v-btn>
                          <v-spacer></v-spacer>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                  <v-row justify="center" align="center">
                    <v-icon md class="" @click="editItem(item)" color="primary">
                      mdi-eye
                    </v-icon>
                    <v-icon md @click="deleteItem(item)" color="#F44336">
                      mdi-delete
                    </v-icon>
                  </v-row>

                </template>
                <template v-slot:no-data>
                  <v-btn color="primary" @click="initialize" >
                    Reset
                  </v-btn>
                </template>
              </v-data-table>   
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-main>