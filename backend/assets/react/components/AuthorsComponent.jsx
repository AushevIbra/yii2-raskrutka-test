import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import sortBy from 'lodash/sortBy'

function Authors() {
    const [authors, setAuthors] = React.useState([]);
    const [loading, setLoading] = React.useState(false);

    React.useEffect(() => {
        getAuthors();
    }, [])

    const getAuthors = () => {
        setLoading(true);
        axios.get('/api/authors')
            .then(response => {

                setAuthors(sortBy(response.data || [], 'name'));
            })
            .catch(error => {
                console.log(error)
            })
            .finally(() => {
                setLoading(false)
            })
    }

    return (

        <div className="panel">
            <div className="panel-heading">Authors</div>

            <div className="panel-body">
                {loading && "Загрузка..."}

                <ul className={"list-group"}>
                    {false === loading && authors.map(author => {
                        return <li className={"list-group-item"} key={author.id}>{author.name} - {author.count}</li>
                    })}
                </ul>


            </div>
        </div>
    );
}

export default Authors;

if (document.getElementById('authors')) {
    ReactDOM.render(<Authors/>, document.getElementById('authors'));
}