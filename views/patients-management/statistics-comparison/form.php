<v-dialog v-model="ComparisonUpcmDialogForm" max-width="600px">
    <v-card v-if="ComparisonUpcmDialogForm">
        <v-toolbar elevation="0">
            <v-toolbar-title>Comparar UPCM</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="ComparisonUpcmDialogForm = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-row>
                    <v-col cols="12" md="12">
                        <label for="">Seleccione UPCM para comparar</label>
                        <v-select v-model="upcm_selected" :items="upcms_filtered"
                            :item-text="(e) => e.upcm_name" clearable return-object>
                            <template #prepend-item>
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-text-field v-model="upcm_search"
                                            placeholder="Buscar upcm"
                                            @input="searchUpcmComparison" @click:clear="searchUpcmComparison" 
                                            clearable outlined></v-text-field>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-divider></v-divider>
                            </template>
                        </v-select>
                    </v-col>
                    <v-btn color="primary"
                        v-if="upcm_selected !== null"
                        @click="ComparisonUpcmDialogForm = false; ComparisonUpcmDialog = true; initializeBasicStatisticsComparison(); initializeBasicStatistics();"
                        block>Continuar</v-btn>
                    </v-row>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>