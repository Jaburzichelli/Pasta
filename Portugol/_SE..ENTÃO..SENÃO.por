programa
{
    funcao inicio()
    {
        inteiro ano, nasc, idade

        escreva("Em que ano estamos? ")
        leia(ano)

        escreva("Em que ano voce nasceu? ")
        leia(nasc)

        idade = ano - nasc

        escreval("Em ", ano, " voce tera ", idade, " anos.")

        se (idade >= 21) entao
            escreval("E ja tera atingido a maioridade.")
        fimse
    }
}