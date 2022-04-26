<v-dialog v-model="ComparisonUpcmDialog" max-width="1200px">
    <v-card v-if="ComparisonUpcmDialog">
        <v-toolbar elevation="0">
            <v-toolbar-title>Comparar UPCM</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="ComparisonUpcmDialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-row>
                    <v-col cols="12" md="12">
                        <?= new Template('patients-management/statistics-comparison/components/tabs') ?>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>