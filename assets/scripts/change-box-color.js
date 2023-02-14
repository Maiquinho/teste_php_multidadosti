const DATA_BOXES = Array.from(document.querySelectorAll('.dashboard-stat')); // Converte todas as boxes em um array
const TABLE = document.querySelector('.portlet.box'); // Seleciona a tabela 
const DEFAULT_COLORS = ['grey', 'blue', 'green', 'purple']; // Define o nome das classes com as cores padrão


/**
 * 
 * Percorre todas as boxes e executa uma função anônima ao clicar em alguma delas
 * 
 * */
DATA_BOXES.forEach(dataBox => {

    dataBox.addEventListener('click', (e) => {

        /**
         * 
         * Não permite a página dar refresh ao clicar no botão.
         * 
         * */ 
        e.preventDefault();


        /**
         * 
         * Define a variável como global no escopo do DATA_BOXES.forEach().
         * 
         * */
        let currentBoxColor = '';


        /**
         * 
         * Percorre todas as cores e define a variável currentBoxColor como o
         * valor da última classe do elemento clicado, ou seja a cor.
         * 
         * */
        DEFAULT_COLORS.forEach(color => {

            if (dataBox.classList.contains(color)) {
                currentBoxColor = color;
            }

        });


        if(!TABLE.classList.contains(currentBoxColor)){

            /**
             * 
             * Pega a ultima classe do elemento table, ou seja a cor atual da tabela.
             * 
             * */ 
            let lastClass = TABLE.getAttribute('class').split(' ').pop();
            
            /**
             * 
             * Verifica se o valor da última classe da tabela é igual a ela mesma,
             * se a condição for satisfeita é removida a última classe e adicionada a 
             * classe inserida na variável currentBoxColor.
             * 
            */
            if(TABLE.classList.contains(lastClass)){
                TABLE.classList.remove(lastClass);
                TABLE.classList.add(currentBoxColor);
            }
        }
        

    })

});