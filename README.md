# Eigenvector Centrality on PHP

PHP library to do calculates Eigenvector Centrality of a graph. Eigenvector Centrality is one of the Social Network Analysis algorithms. Basically, this library just translating the [PowerIteration by Aboks](https://github.com/aboks/power-iteration) to the Graph way.

## Installation

Install using composer:

```bash
composer require sensasi-delight/eigenvector-cetrality-php
```

## Basic usage

1. Make a Graph object

    ```php
    use SensasiDelight\EigenvectorCentralityPHP\Graph;
    $g = new Graph();
    ```

2. Define the nodes (optional)

    ```php
    $g->add_node('v1');
    $g->add_node('v2');
    $g->add_node('v3');
    $g->add_node('v4');
    $g->add_node('v5');
    ```

    or

    ```php
    $g->add_nodes_from([
        'v1',
        'v2',
        'v3',
        'v4',
        'v5',
    ]);
    ```

3. Define the edges

    ```php
    $g->add_edge('v1', 'v2');
    $g->add_edge('v1', 'v4');
    $g->add_edge('v2', 'v3');
    $g->add_edge('v2', 'v4');
    $g->add_edge('v2', 'v5');
    $g->add_edge('v3', 'v4');
    ```

    or

    ```php
    $g->add_edges_from([
        ['v1', 'v2'],
        ['v1', 'v4'],
        ['v2', 'v3'],
        ['v2', 'v4'],
        ['v2', 'v5'],
        ['v3', 'v4']
    ]);
    ```

4. Get and print the Eigenvector Centrality value

    ```php
    $result = $g->get_eigenvector_centrality();
    print_r(result);
    ```

    it's should be returning output:

    ```bash
    Array
    (
        [node1] => 0.4119172769405
        [node2] => 0.58253899962505
        [node3] => 0.4119172769405
        [node4] => 0.52368294422478
        [node5] => 0.21691657788138
    )
    ```

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement". Don't forget to give the project a star! Thanks again!

1. Fork the Project.
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`).
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the Branch (`git push origin feature/AmazingFeature`).
5. Open a Pull Request.

## License

The code is released under the MIT license.

## Contact

Email - [zainadam.id@gmail.com](mailto:zainadam.id@gmail.com?subject=[GitHub]%20EigenvectorCentralityPHP)

Twitter - [@sensasi_DELIGHT](https://twitter.com/sensasi_DELIGHT)
