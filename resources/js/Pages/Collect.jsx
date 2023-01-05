import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Collect.css';
import './css/All.css';

const Collect = (props) => {
    const { search_users } = props;
    
    return (
            <body>
            <div className="collect-box3">
                <div className="collect-box3-title"><h1>検索一覧</h1></div>
                <p className="collect-content">
                { search_users.map((search_user) => (
                    <div className="content-result" key={search_user.id}>
                        <p>検索結果：[ <Link href={`/future/otherpage/${search_user.id}`}>{ search_user.name }</Link>]</p>
                    </div>
                )) }
                </p>
                <div className="back-to-index">
	               <Link href={`/future`}>戻る</Link>
	           </div>
            </div>
            </body>
    );
}

export default Collect;