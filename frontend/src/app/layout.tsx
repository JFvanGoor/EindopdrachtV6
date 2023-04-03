import './globals.css'
import {ReactNode} from "react";

export const metadata = {
  title: 'To English Translator',
  description: 'Eindopdracht gemaakt door Juda en Floris',
}

export interface Props {
    children: ReactNode
}

export default function RootLayout({children}: Props) {
  return (
    <html lang="nl-NL">
        <body>{children}</body>
    </html>
  )
}
