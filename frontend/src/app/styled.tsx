import React, {ReactNode} from "react";

export function Label(props: { htmlFor: string, children: string }) {
    return <label {...props} className="block text-sm font-medium leading-6 text-gray-900"/>
}

export function Input({type = 'text', ...props}: { type?: string, name?: string, value?: string }) {
    return <input {...props} type={type}
                  className="block w-full rounded-md border-0 mt-1 py-1.5 pl-4 pr-4 text-center text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
}

export function Select(props: { name: string, children: ReactNode }) {
    return <select {...props}
                   className="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
}
