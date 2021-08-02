import React from 'react';
import {Link} from "react-router-dom";


const Bookmarks = () => {

    const BOOKMARKS = [
        {
            id: 1,
            type: "TEXT",
            source: "Les Brown",
            content: "You have to put yourself in a state of perpetual discomfort in order to manifest your greatness.",
            tags: [
                {
                    id: 1,
                    name: "quotes"
                },
                {
                    id: 2,
                    name: "self-improvement"
                },

            ]
        }, {
            id: 2,
            type: "TEXT",
            source: "After life",
            content: "Happiness is amazing. It's so amazing it doesn't matter if it's yours or not.",
            tags: [
                {
                    id: 1,
                    name: "quotes"
                },
                {
                    id: 3,
                    name: "happiness"
                },
            ]
        }, {
            id: 3,
            type: "TEXT",
            source: "Jim Carrey",
            content: "Your need for acceptance can make you invisible in this world. Don't let anything stand in the way of the light that shines through this form. Risk being seen in all of your glory.",
            tags: [
                {
                    id: 1,
                    name: "quotes"
                },
                {
                    id: 2,
                    name: "self-improvement"
                },
            ]
        }
    ];

    return (
        <div id="bookmarks">
            {
                BOOKMARKS.map(bookmark => (
                    <section className="bookmark" key={bookmark.id.toString()}>
                        <div className="content">
                            {bookmark.content}
                        </div>

                        <div className="meta">
                            <div className="source">
                                <ion-icon name="library-outline"/> {bookmark.source}
                            </div>
                            <div className="tags">
                                <ion-icon name="pricetag-outline"/>
                                {bookmark.tags.map(tag => (
                                    <Link to="/">{tag.name}</Link>
                                ))}
                            </div>
                        </div>
                    </section>
                ))
            }
        </div>
    )
};


export default Bookmarks;
