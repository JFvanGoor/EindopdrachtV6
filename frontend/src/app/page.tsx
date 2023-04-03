import styles from './page.module.css'
import React from "react"
import {Inter} from 'next/font/google'
import Translator from "@/app/translator"
import AddWord from "@/app/add-word"

const inter = Inter({subsets: ['latin']})

// De basis van de home pagina
export default function Home() {

    return (
        <main className={styles.main + ' ' + inter.className}>
            <div>
                <h1>Welkom bij de vertaalmachine</h1>
                <div className={styles.card}>
                    <p>
                        U kunt hier woorden en zinnen vertalen van het Nederlands naar het Engels, en woorden toevoegen
                    </p>
                </div>
            </div>
            {/* Voor de doeleinden hiervan, zie translator.tsx */}
            <Translator/>
            {/* Voor de doeleinden hiervan, zie add-word.tsx */}
            <AddWord/>
        </main>
    )
}
