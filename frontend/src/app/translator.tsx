"use client";
import useSWR from "@/api/useSWR";
import React, {useState} from "react";
import {Input} from "@/app/styled";

// Het invulvak voor de te vertalen opdracht in een form
export default function Translator() {

    const [text, setText] = useState("");
    const url = text.length == 0 ? null : 'http://localhost:8080'
    const translation = useSWR(url, {text}).data

    return <>
        <form onSubmit={(e) => {
            e.preventDefault()
            setText((e.target as HTMLFormElement).text.value)
        }}>
            <Input name="text"/>
            <Input type="submit" value="Translate"/>
        </form>
        {translation}
    </>
}
