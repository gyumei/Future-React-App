import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Share.css';
import './css/All.css';
import moment from 'moment'

const Share = (props) => {

const { futures } = props;

const now = moment()

return (
            <body>
            {
                (
                   ()=> {
                        if(futures === null) {
                            <p>シェアされた投稿はありません。</p>
                        } else {
                        return (
                    <div className="content">
                        <div className="share-box">
                            { futures.map((future) => (
                            <div key={future.id}>
                            { moment(future.year).isAfter(now) ? (
                            <div className="share_box_title">
                                <div className="theme">個人のタイムカプセル</div>
                                <p className="data_text">{ future.user }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            ):(
                            <div className="share_box_title">
                                <div className="data_text">
                                    <Link href={`/future/ownpage/${future.id}`} >タイムカプセル</Link>
                                </div>
                                <p>{ future.user }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            )
                            }
                        </div>
                        )
                        )
                        }
                    </div>
                </div>
                         )
                        }
                        }
                    )
                ()
            }
            <div className="back-to-index">
	           <Link href={`/future`}>戻る</Link>
	       </div>
            </body>
    );
}

export default Share;