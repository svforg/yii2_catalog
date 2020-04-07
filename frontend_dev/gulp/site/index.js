'use strict';

const model = '/site/';
const action = 'index';

const templatePath = '../view/' + model;
const phpFiles = './app/view/' + model + action + '/*.php';

import * as templateFile from '../tasks/template.js';

exports.build = () => {
    templateFile.template(phpFiles, templatePath)
};


