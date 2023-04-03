import _useSWR, { SWRResponse } from "swr";

const fetcher = (url: string) => fetch(url).then((res) => res.text());

/*
 * Doet een request bij gespecificeerde url met gespecificeerde parameters.
 * Als url null is, wordt er geen request gedaan.
 */
export default function useSWR(
    url: string | null,
    parameters: Object
): SWRResponse<string, any, any> {
    const parameterStr = Object.entries(parameters)
        .map(([key, value]) => `${key}=${value}`)
        .join("&");
    return _useSWR(url == null ? null : url + "?" + parameterStr, fetcher);
}
