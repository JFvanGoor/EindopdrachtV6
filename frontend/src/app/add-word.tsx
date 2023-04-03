"use client";
import React, {ReactNode, useState} from "react";
import {Input, Label, Select} from "@/app/styled";

// set van alle woordfuncties
const functieOptions = [
    'werkwoord', 'zelfstandig naamwoord', 'bijvoeglijk naamwoord',
    'voornaamwoord', 'bijwoord', 'lidwoord', 'telwoord', 'voegwoord',
    'voorzetsel', 'tussenwerpsel'
]

//set van aparte zaken, hier specialiseringen van voornaamwoorden
const apartOptions = [
    'persoonlijk', 'wederkerig', 'bezittelijk'
]

// de in te vullen form voor het invoeren van een nieuw woord: het woord zelf, vertaling, functie en aparte zaak
export default function AddWord() {

    const [result, setResult] = useState('')

    return <>
        <form onSubmit={(e) => {
            e.preventDefault()

            const form = e.target as HTMLFormElement;
            fetch('http://localhost:8080', {
                method: 'POST',
                body: new FormData(form)
            }).then(async res => setResult(await res.text()))
        }}>
            <Label htmlFor="woord">Nederlands woord:</Label>
            <Input name="woord"/>

            <Label htmlFor="vertaling">Engels woord:</Label>
            <Input name="vertaling"/>

            <Label htmlFor="functie">Soort woord:</Label>
            <Select name="functie">
                {functieOptions.map(functie => <option value={functie} children={functie} key={functie}/>)}
            </Select>

            <Label htmlFor="apart">Extra utilities:</Label>
            <Select name="apart">
                <option value="">Geen</option>
                {apartOptions.map(apart => <option value={apart} children={apart} key={apart}/>)}
            </Select>

            <Input type="submit" value="Woorden toevoegen"/>
        </form>
        {result}
    </>
}
